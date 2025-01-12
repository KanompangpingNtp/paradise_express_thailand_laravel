<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPdf extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'tour_pdf_file'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
