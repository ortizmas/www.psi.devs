<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'user_id',
    	'name',
    	'cpf',
    	'cep',
    	'street',
    	'neighborhood',
    	'city',
    	'state',
    	'ibge',
    	'email_inscription',
    	'phone',
    	'company',
    	'company_phone',
    	'program',
    ];

    
}
