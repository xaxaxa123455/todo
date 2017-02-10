<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
    ];

    protected $table = 'lists';

    public static function validate($data) {
        $rules = array(
            'name'      =>  'required',
        );
        $validator = \Validator::make($data, $rules);
        return $validator;
    }

    public function userId() {
        return $this->hasOne('App\User');
    }
}
