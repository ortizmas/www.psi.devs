<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Inscription extends Model
{
    protected $table = 'inscriptions';

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
            ->withPivot('course', 'amount', 'price', 'subtotal', 'status', 'code')
            ->withTimestamps();
    }

    public static function getCourses()
    {
        
        $inscription = Inscription::where('user_id', auth()->user()->id)->firstOrFail();
        $courses = $inscription->courses()->where('course_inscription.status', '!=', 2)->get();
        
        return $courses;
    }

    public function updatePivoteTable(array $data)
    {
        $inscription = $this->find($data['inscription_id']);

        if ($inscription) {
            return $inscription->courses()->updateExistingPivot($data['course_id'], [
                'status' => $data['status']
            ]);
        }
    }
}
