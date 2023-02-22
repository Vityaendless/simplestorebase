<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Street;

class City extends Model
{
    use HasFactory, SoftDeletes;

    public function streets() {
        return $this->hasMany(Street::class);
    }
}
