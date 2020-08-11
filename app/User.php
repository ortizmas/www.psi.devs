<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        if ($password) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    public function isSuperAdmin()
    {
        $user = Auth::user();
        // trait HasRoles::getRoleNames
        foreach ($user->getRoleNames() as $value) {
            if ($value === 'super-admin') {
                return true;
            }
        }

        return false;
    }

    public function pages()
    {
        return $this->hasMany('App\Page');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function trainees()
    {
        return $this->hasMany('App\Trainee');
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function inscription()
    {
        return $this->hasOne(Inscription::class);
    }
}
