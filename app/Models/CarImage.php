<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;

    protected $fillable = ['car_model_id', 'car_images_file','car_images_status'];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }
}
