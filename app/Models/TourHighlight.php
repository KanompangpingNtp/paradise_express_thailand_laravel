<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourHighlight extends Model
{
    use HasFactory;

    protected $fillable = ['tour_id', 'tour_highlight_detail'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
