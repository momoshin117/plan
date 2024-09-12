<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotReviewPhoto extends Model
{
    use HasFactory;
    
    public function spot_review()
    {
        return $this ->belongsTo(SpotReview::class);
    }
}
