<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelPlanSpotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /*public function authorize(): bool
    {
        return false;
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'travel_plan_spot.spot_master_id'=>'required|integer',
            'travel_plan_spot.arrive_date'=>'required|date',
            'travel_plan_spot.arrive_time'=>'required|date_format:H:i',
            'travel_plan_spot.departure_date'=>'required|date',
            'travel_plan_spot.departure_time'=>'required|date_format:H:i',
            'travel_plan_spot.money'=>'required|integer|lte:travel_plan_spot.use_money'
            
        ];
    }
}
