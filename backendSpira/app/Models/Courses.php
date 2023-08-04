<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model {

    protected $table = 'courses';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'hourly_intensity',
        'created_at',
        'updated_at'
    ];

}