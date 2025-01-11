<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteTotal extends Model
{
    use HasFactory;

    protected $fillable = ['route_detail_id', 'car_model_id', 'data_price'];

    public function routeDetail()
    {
        return $this->belongsTo(RouteDetail::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
