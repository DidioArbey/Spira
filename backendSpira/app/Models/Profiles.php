<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model {

    protected $table = 'profiles';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

}