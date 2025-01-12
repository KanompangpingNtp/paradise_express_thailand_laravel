<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['car_brand_id', 'car_model_name'];

    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function carImages()
    {
        return $this->hasMany(CarImage::class);
    }

    public function routeTotals()
    {
        return $this->hasMany(RouteTotal::class);
    }
}
