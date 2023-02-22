<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function add() 
    {
        $city = new City;

        $city->name = 'Калининград';
        $city->country_id = 1;

        $city->save();

        echo "ADD_city";
    }
}
