<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingCar extends Model
{
    use HasFactory;
    
    public function spot_masters()
    {
        return $this->hasMany(SpotMaster::class);  
    }
    
    protected $fillable=[
        'number',
        'updated_at',
        'created_at'
    ];
}
