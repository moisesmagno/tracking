<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Influencer extends Model
{
    use SoftDeletes;

    protected $table = 'influencers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_campaign', 'name', 'destiny_url', 'short_url'];

    protected $dates = ['deleted_at', 'created_at'];

    protected $softDelete = true;

}
