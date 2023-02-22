<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;

class BuildingController extends Controller
{
    public function add() 
    {
        $building = new Building;

        $building->name = '1010';
        $building->street_id = 8;

        $building->save();

        echo "ADD_building";
    }
}
