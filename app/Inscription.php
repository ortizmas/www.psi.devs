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
		'status',
	];

	public function user()
	{
		return $this->belognsTo(User::class);
	}

	public function courses()
	{
		return $this->belongsToMany(Course::class)
			->withPivot('course', 'amount', 'price', 'subtotal')
			->withTimestamps();
	}
}