<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producttype;

class ProducttypeController extends Controller
{
    public function add() 
    {
        $pt = new Producttype;

        $pt->name = 'Computers and laptops';

        $pt->save();

        echo "ADD_pt";
    }
}
