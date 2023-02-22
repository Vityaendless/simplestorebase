<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appartment;

class AppartmentController extends Controller
{
    public function add() 
    {
        $appartment = new Appartment;

        $appartment->name = '10';
        $appartment->building_id = 10;

        $appartment->save();

        echo "ADD_appartment";
    }
}
