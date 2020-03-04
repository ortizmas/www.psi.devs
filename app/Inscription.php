<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        
        /**
         * Get the user that did the inscription.
         */
        return $this->belognsTo(User::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withPivot('course', 'amount', 'price', 'subtotal', 'status', 'code')
            ->withTimestamps();
    }

    public static function getCourses()
    {
        /*$query = Inscription::with('courses')->where('user_id', Auth::id())->get();
        return collect($query[0]->courses);*/
        return Course::whereHas('inscriptions', function ($q) {
            $q->where('user_id', Auth::id());
        })->orderBy('name', 'asc')->get();
    }
}
