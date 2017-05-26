<?php

namespace App\Http\Controllers;

use App\UserAccessInformation;
use Illuminate\Http\Request;

class UserAccessInformationController extends Controller
{

	private $userAccessInformation;

	public function __construct(UserAccessInformation $userAccessInformation){
		$this->userAccessInformation = $userAccessInformation;
	}

    //Register user Information
    public function store(Request $request){

        $id_user = $request->get('id_user');
		$id_pixel_conversion = $request->get('id_pixel_conversion');
		$url = $request->get('url');
		$agent = $request->get('agent');
		// $remote_addr = $request->get('remote_addr');
		$city = $request->get('city');
		$region_code = $request->get('region_code');
		$region_name = $request->get('region_name');
		$country_code = $request->get('country_code');
		$country_name = $request->get('country_name');
		$time_zone = $request->get('time_zone');
		$latitude = $request->get('latitude');
		$longitude = $request->get('longitude');


		//REMOTE_ADDR
        $remote_addr = $_SERVER["REMOTE_ADDR"];

		// Verifies that the same ip that accessed the conversion pixel
		$dataUser = $this->userAccessInformation
            ->where('id_pixel', $id_pixel_conversion)
            ->where('remote_addr', $remote_addr)
            ->first();

        if(!$dataUser){
        	$this->userAccessInformation->create([
               'id_user' => $id_user,
               'id_pixel' => $id_pixel_conversion,
               'id_influencer' => NULL,
               'referer_short_url' => NULL,
               'url' => $url,
               'agent' => $agent,
               'remote_addr' => $remote_addr,
               'city' => $city,
               'region_code' => $region_code,
               'region_name' => $region_name,
               'country_code' => $country_code,
               'country_name' => $country_name,
               'time_zone' => $time_zone,
               'latitude' => $latitude,
               'longitude' => $longitude
           ]);
        }else{

	       if($dataUser->remote_addr == $remote_addr && $dataUser->id_influencer != NULL && $dataUser->referer_short_url != NULL && $dataUser->id_user == NULL && $dataUser->url == NULL){

	           $this->userAccessInformation
	               ->where('id_pixel', $id_pixel_conversion)
	               ->where('remote_addr', $remote_addr)
	               ->update([
	               'id_user' => $id_user,
	               'id_pixel' => $id_pixel_conversion,
	               'url' => $url,
	               'agent' => $agent,
	               // 'remote_addr' => $remote_addr,
	               'city' => $city,
	               'region_code' => $region_code,
	               'region_name' => $region_name,
	               'country_code' => $country_code,
	               'country_name' => $country_name,
	               'time_zone' => $time_zone,
	               'latitude' => $latitude,
	               'longitude' => $longitude
	           ]);

	       }elseif($dataUser->remote_addr == NULL && $dataUser->id_influencer == NULL && $dataUser->referer_short_url == NULL && $dataUser->id_user == NULL){

	           $this->userAccessInformation->create([
	               'id_user' => $id_user,
	               'id_pixel' => $id_pixel_conversion,
	               'id_influencer' => NULL,
	               'referer_short_url' => NULL,
	               'url' => $url,
	               'agent' => $agent,
	               'remote_addr' => $remote_addr,
	               'city' => $city,
	               'region_code' => $region_code,
	               'region_name' => $region_name,
	               'country_code' => $country_code,
	               'country_name' => $country_name,
	               'time_zone' => $time_zone,
	               'latitude' => $latitude,
	               'longitude' => $longitude
	           ]);
	       }
	    }
    }
}
