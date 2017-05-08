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
		'id_user', 'id_pixel_conversion', 'id_campaign', 'agent', 'short_url', 'agent', 'url', 'city', 'country_code', 'country_name', 'remote_addr', 'region_code', 'region_name', 'time_zone', 'latitude', 'longitude'
	];

	protected $dates = ['deleted_at'];

	protected $softDelete = true;

	public function pixelConversion(){
		return $this->belongsTo(PixelConversion::class,'id','id_pixel_conversion');
	}

	
}
