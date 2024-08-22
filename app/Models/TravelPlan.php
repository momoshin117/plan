<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPlan extends Model
{
    use HasFactory;
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
