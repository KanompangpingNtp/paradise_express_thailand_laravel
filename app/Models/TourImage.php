<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'tour_image_files', 'tour_image_status'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
