<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourSection extends Model
{
    use HasFactory;

    protected $fillable = ['tour_section_name'];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
