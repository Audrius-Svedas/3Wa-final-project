<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'date_of_birth',
        'phone',
        'address',
        'city',
        'zip',
        'country_id',
        'admin_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function country() {
      return $this->hasOne('App\Country');
    }

    public function adminRole()
    {

    return $this->admin_role; // this looks for an admin column in your users table
    }
}
