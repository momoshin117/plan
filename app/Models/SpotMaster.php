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

    public function category()
    {
        return $this ->belongsTo(Category::class);
    }
    
    public function prefecture(){
        return $this ->belongsTo(Prefecture::class);
    }
    
     public function parking_car(){
        return $this ->belongsTo(ParkingCar::class);
    }
    
}
