<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PixelConversion extends Model
{
    use SoftDeletes;

    protected $table = 'pixel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user', 'id_influencer', 'name', 'time_interval', 'interval_type', 'value'];

    protected $dates = ['deleted_at', 'created_at'];

    protected $softDelete = true;

    public function usersAccessInformations(){
        return $this->hasMany(UserAccessInformation::class,'id_pixel','id');
    }

    public function getCampaigns(){
        return $this->hasMany(Campaign::class, 'id_pixel', 'id');
    }
}
