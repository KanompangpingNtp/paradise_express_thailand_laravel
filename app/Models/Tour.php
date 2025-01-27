<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['tour_section_id', 'tour_name', 'tour_detail'];

    public function tourSection()
    {
        return $this->belongsTo(TourSection::class);
    }

    public function highlights()
    {
        return $this->hasMany(TourHighlight::class);
    }

    public function images()
    {
        return $this->hasMany(TourImage::class);
    }

    public function pdfs()
    {
        return $this->hasMany(TourPdf::class);
    }

}
