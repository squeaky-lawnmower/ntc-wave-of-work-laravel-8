<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class ListController extends Controller
{
    function listStates($countryCode) {
        
        $states = Province::where('country_code', $countryCode)->get();

        return $states;
    }

    function listCities($provinceCode) {
        $cities = City::where('province_code', $provinceCode)->get();

        return $cities;
    }
}
