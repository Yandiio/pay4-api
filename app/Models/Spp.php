<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{

    protected $table = 'spp';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nominal', 'tahun_ajaran',
    ];
}
