<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function spot_master() {
        return $this->belongsTo(SpotMaster::class);
    }
    
    protected $fillable=[
        'user_id',
        'spot_master_id',
        'updated_at',
        'created_at'
    ];
}
