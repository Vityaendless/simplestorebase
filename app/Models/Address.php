<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Country;
use App\Models\City;
use App\Models\Street;
use App\Models\Building;
use App\Models\Appartment;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function street() {
        return $this->belongsTo(Street::class);
    }

    public function building() {
        return $this->belongsTo(Building::class);
    }

    public function appartment() {
        return $this->belongsTo(Appartment::class);
    }
}
