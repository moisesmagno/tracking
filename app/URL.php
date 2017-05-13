<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class URL extends Model
{

    use SoftDeletes;

    protected $table = 'urls';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_campaign', 'description', 'destiny_url', 'short_url', 'pixel_name'
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;

}
