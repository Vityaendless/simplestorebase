<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    public function add() 
    {
        $status = new Status;

        $status->name = 'Не оплачено';

        $status->save();

        echo "ADD_status";
    }
}
