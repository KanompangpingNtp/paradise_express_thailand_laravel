<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;

    protected $fillable = ['car_brand_name'];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }
}
