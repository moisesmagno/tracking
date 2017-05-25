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
    public function store(){
	
		$id_user = $_POST['id_user'];
		$id_pixel_conversion = $_POST['id_pixel_conversion'];
		$id_influencer = (isset($_COOKIE['id_influencer']))? $_COOKIE['id_influencer'] : NULL;
		$referer = (isset($_COOKIE['referer']))? $_COOKIE['referer'] : NULL;
		$url = $_POST['url'];
		$agent = $_POST['agent'];
		$remote_addr = $_POST['remote_addr'];
		$city = $_POST['city'];
		$region_code = $_POST['region_code'];
		$region_name = $_POST['region_name'];
		$country_code = $_POST['country_code'];
		$country_name = $_POST['country_name'];
		$time_zone = $_POST['time_zone'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];

		
		// Verifies that the same ip that accessed the conversion pixel
		$dataUser = $this->userAccessInformation->where('remote_addr', $remote_addr)->first();

		if(empty($dataUser)){
			
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
