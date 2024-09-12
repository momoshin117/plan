<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotReview extends Model
{
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this::with('spot_master')->orderBy('updated_at','desc')->paginate($limit_count);
    }
    
    public function spot_master()
    {
        return $this ->belongsTo(SpotMaster::class)->with('category');
    }
    
    public function prefecture(){
        return $this ->belongsTo(Prefecture::class);
    }
    
    public function spot_review_photos()
    {
        return $this->hasMany(SpotReviewPhoto::class);  
    }
    
    protected $fillable = [
        'spot_master_id',
        'score',
        'commment',
        'nickname',
        'updated_at',
        'cleated_at'
    ];
}
