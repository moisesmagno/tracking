<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_campaign', 'description', 'destiny_url'
    ];

    protected $softDelete = true;

}
