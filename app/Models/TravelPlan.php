<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPlan extends Model
{
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('user')->orderBy('departure_date', 'ASC')->paginate($limit_count);
    }
    
    public function travel_plan_spots(){
        return $this ->hasMany(TravelPlanSpot::class)->with('spot_master');
    }
    
    public function user(){
        return $this ->belongsTo(User::class);
    }
    
    
    protected $fillable=[
        'plan_name',
        'user_id',
        'departure_date',
        'long',
        'money',
        'disclose',
        'updated_at',
        'cleated_at'
        ];
}
