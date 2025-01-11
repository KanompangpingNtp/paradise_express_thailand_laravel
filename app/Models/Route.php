<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['province_id', 'route_name'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function routeDetails()
    {
        return $this->hasMany(RouteDetail::class);
    }
}
