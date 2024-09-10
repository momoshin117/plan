<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotPhoto extends Model
{
    use HasFactory;
    
    public function spot_master()
    {
        return $this ->belongsTo(SpotMaster::class);
    }
}
