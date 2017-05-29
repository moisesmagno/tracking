<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccessInformation extends Model
{
    use SoftDeletes;

	protected $table = 'user_access_information';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id_user', 'id_pixel', 'id_influencer', 'referer_short_url', 'url', 'agent', 'remote_addr', 'city', 'region_code', 'region_name', 'country_code', 'country_name', 'time_zone', 'latitude', 'longitude', 'id_agent'
	];

    protected $dates = ['deleted_at', 'created_at'];

	protected $softDelete = true;

	public function pixelConversion(){
		return $this->belongsTo(PixelConversion::class,'id','id_pixel');
	}

	
}
