<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

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

    public static function validateLogin($data) {
        $rules = array(
            'name'      =>  'required',
            'password'  =>  'required'
        );
        $validator = \Validator::make($data, $rules);
        return $validator;
    }

    public static function validateRegistration($data) {
        $rules = array(
            'name'             => 'required|unique:users',                        // just a normal required validation
            'email'            => 'required|email|unique:users',     // required and must be unique in the ducks table
            'password'         => 'required',
            'password_confirm' => 'required|same:password'           // required and has to match the password field
        );

        $validator = \Validator::make($data, $rules);
        return $validator;
    }

    public function taskLists() {
        return $this->hasMany('App\TaskList');
    }

}
