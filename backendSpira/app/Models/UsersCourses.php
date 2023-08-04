<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersCourses extends Model {

    protected $table = 'users_courses';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'id_user',
        'id_user',
        'created_at',
        'updated_at'
    ];

}