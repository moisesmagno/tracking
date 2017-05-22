<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{

    use SoftDeletes;

    protected $table = 'results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_influencer', 'referer', 'agent', 'remote_addr'
    ];

    protected $dates = ['deleted_at'];
    
    protected $softDelete = true;

}
