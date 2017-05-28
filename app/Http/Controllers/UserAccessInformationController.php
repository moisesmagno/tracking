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

        header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type, *");

        $id_user = $request->get('id_user');
		$id_pixel_conversion = $request->get('id_pixel_conversion');
        $id_influencer = (isset($_COOKIE['id_influencer']))? $_COOKIE['id_influencer'] : NULL;
        $referer = (isset($_COOKIE['referer']))? $_COOKIE['referer'] : NULL;
        $url = $request->get('url');
		$agent = $request->get('agent');
	    $remote_addr = $request->get('remote_addr');
		$city = $request->get('city');
		$region_code = $request->get('region_code');
		$region_name = $request->get('region_name');
		$country_code = $request->get('country_code');
		$country_name = $request->get('country_name');
		$time_zone = $request->get('time_zone');
		$latitude = $request->get('latitude');
		$longitude = $request->get('longitude');

		// Verifies that the same ip that accessed the conversion pixel
		$dataUser = $this->userAccessInformation
            ->where('id_pixel', $id_pixel_conversion)
            ->where('remote_addr', $remote_addr)
            ->first();

        if(!$dataUser){
        	$this->userAccessInformation->create([
               'id_user' => $id_user,
               'id_pixel' => $id_pixel_conversion,
               'id_influencer' => $id_influencer,
               'referer_short_url' => $referer,
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
