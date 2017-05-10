<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{

    use SoftDeletes;

    protected $table = 'campaigns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'name'
    ];

    protected $dates = ['deleted_at', 'created_at'];
    
    protected $softDelete = true;
}
