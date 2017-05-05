<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PixelConversion extends Model
{
    use SoftDeletes;

    protected $table = 'pixel_conversion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user', 'id_campaign', 'name', 'time_interval', 'interval_type'];

    protected $dates = ['deleted_at'];

    protected $softDelete = true;
}
