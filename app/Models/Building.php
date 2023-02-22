<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Appartment;

class Building extends Model
{
    use HasFactory, SoftDeletes;

    public function appartments() {
        return $this->hasMany(Appartment::class);
    }
}
