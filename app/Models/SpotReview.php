<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotReview extends Model
{
    use HasFactory;
    
    public function spot_master()
    {
        return $this ->belongsTo(SpotMaster::class)->with('category');
    }
    
    public function prefecture(){
        return $this ->belongsTo(Prefecture::class);
    }
    
    public function user(){
        return $this ->belongsTo(User::class);
    }
    
    public function spot_review_photos()
    {
        return $this->hasMany(SpotReviewPhoto::class);  
    }
    
    protected $fillable = [
        'user_id',
        'spot_master_id',
        'score',
        'comment',
        'nickname',
        'updated_at',
        'cleated_at'
    ];
}
