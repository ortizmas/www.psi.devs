<?php

use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

if (!function_exists('classActivePath')) {
    function classActivePath($segment, $value)
    {
        if (!is_array($value)) {
            return Request::segment($segment) == $value ? ' menu-open' : '';
        }
        foreach ($value as $v) {
            if (Request::segment($segment) == $v) return ' menu-open';
        }
        return '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($segment, $value)
    {
        if (!is_array($value)) {
            return Request::segment($segment) == $value ? 'active' : '';
        }
        foreach ($value as $v) {
            if (Request::segment($segment) == $v) return 'active';
        }
        return '';
    }
}

if (!function_exists('classCoverterDate')) {
    function classCoverterDate($date, $format = 'd/m/Y')
    {
        return date($format, strtotime($date));
    }
}

if (!function_exists('LongTimeFilter')) {
    function LongTimeFilter($date)
    {
        if ($date == null) {
            return "Sem Data";
        }

        $start_date = $date;
        $since_start = $start_date->diff(new \DateTime(date("Y-m-d") . " " . date("H:i:s")));

        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    if ($since_start->h == 0) {
                        if ($since_start->i == 0) {
                            if ($since_start->s == 0) {
                                $result = $since_start->s . ' segundos';
                            } else {
                                if ($since_start->s == 1) {
                                    $result = $since_start->s . ' segundo';
                                } else {
                                    $result = $since_start->s . ' segundos';
                                }
                            }
                        } else {
                            if ($since_start->i == 1) {
                                $result = $since_start->i . ' minuto';
                            } else {
                                $result = $since_start->i . ' minutos';
                            }
                        }
                    } else {
                        if ($since_start->h == 1) {
                            $result = $since_start->h . ' hora';
                        } else {
                            $result = $since_start->h . ' horas';
                        }
                    }
                } else {
                    if ($since_start->d == 1) {
                        $result = $since_start->d . ' día';
                    } else {
                        $result = $since_start->d . ' días';
                    }
                }
            } else {
                if ($since_start->m == 1) {
                    $result = $since_start->m . ' mês';
                } else {
                    $result = $since_start->m . ' meses';
                }
            }
        } else {
            if ($since_start->y == 1) {
                $result = $since_start->y . ' ano';
            } else {
                $result = $since_start->y . ' anos';
            }
        }

        return "Faz " . $result;
    }
}

if (!function_exists('onlyNumbers')) {
    function onlyNumbers($str)
    {
        return preg_replace("/[^0-9]/", "", $str);
    }
}

if (!function_exists('moneyFormat')) {
    function moneyFormat($str)
    {
        return number_format($str, 2, ',', '.');
    }
}