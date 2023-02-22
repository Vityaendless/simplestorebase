<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;

class Status extends Model
{
    use HasFactory, SoftDeletes;

    public function orders(){
        return $this->hasMany(Order::class);          
    }
}
