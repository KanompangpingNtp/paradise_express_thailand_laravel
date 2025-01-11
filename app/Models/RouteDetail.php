<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteDetail extends Model
{
    use HasFactory;

    protected $fillable = ['route_id', 'route_detail_name'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function routeTotals()
    {
        return $this->hasMany(RouteTotal::class);
    }
}
