<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;
    
    public function spot_masters()
    {
        return $this->hasMany(SpotMaster::class);
        
    }
    
    public function spot_reviews()
    {
        return $this->hasMany(SpotReview::class);
        
    }

}
