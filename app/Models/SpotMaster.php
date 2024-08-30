<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotMaster extends Model
{
    use HasFactory;
    
    public function travel_plan_spots()   
{
    return $this->hasMany(TravelPlanSpot::class);  
}
}
