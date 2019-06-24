<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
    	'name',
    	'cpf',
    	'cep',
    	'street',
    	'neighborhood',
    	'city',
    	'state',
    	'ibge',
    	'email',
    	'phone',
    	'company',
    	'company_phone',
    	'program',
    ];
}
