<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Street;

class StreetController extends Controller
{
    public function add() 
    {
        $street = new Street;

        $street->name = 'Свободная';
        $street->city_id = 4;

        $street->save();

        echo "ADD_street";
    }
}
