<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function add() 
    {
        $country = new Country;

        $country->name = 'Украина';

        $country->save();

        echo "ADD_country";
    }

    public function show()
    {
        $countries = Country::with(['cities'])->get();

        foreach ($countries as $country) {
            dump($country->name);

            foreach ($country->cities as $city) {
                dump($city->name);

                foreach ($city->streets as $street) {
                    dump($street->name);

                    foreach ($street->buildings as $building) {
                        dump($building->name);

                        foreach ($building->appartments as $appartment) {
                            dump($appartment->name);
                        }
                    }
                }
            }
        }
    }
}
