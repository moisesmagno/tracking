<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class APIPixelConversion extends Model
{
    use SoftDeletes;

    protected $table = 'pixel_conversion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'id_campaign', 'agent', 'short_url', 'agent', 'url', 'city', 'country_code', 'country_name', 'remote_addr', 'region_code', 'region_name', 'time_zone', 'latitude', 'longitude'
    ];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;
}
