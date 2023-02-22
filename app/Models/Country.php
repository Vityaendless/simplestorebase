<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\City;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    public function cities() {
        return $this->hasMany(City::class);
    }
}
