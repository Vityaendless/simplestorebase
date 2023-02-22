<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Producttype;
use App\Models\Order;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function producttype()
    {
        return $this->belongsTo(Producttype::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
