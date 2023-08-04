<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

    protected $table = 'users';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_profile',
    ];

}