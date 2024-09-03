<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   /* public function authorize(): bool
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
            
            'travel_plan.plan_name'=>'required',
            'travel_plan.departure_date'=>'required|date',
            'travel_plan.long'=>'required|integer',
            'travel_plan.money'=>'required|integer',
            'travel_plan.disclose'=>'required'
            
        ];
    }
}
