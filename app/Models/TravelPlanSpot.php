<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPlanSpot extends Model
{
    use HasFactory;
    
    public function travel_plan(){
        return $this ->belongsTo(TravelPlan::class);
    }
    
    public function spot_master()
{
    return $this->belongsTo(SpotMaster::class);
}
}
