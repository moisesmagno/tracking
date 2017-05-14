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
    protected $fillable = ['id_user', 'id_campaign', 'name'];

    protected $dates = ['deleted_at', 'created_at'];

    protected $softDelete = true;
}
