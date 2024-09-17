<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpotReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
    */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'spot_review.spot_master_id'=>'required',
            'spot_review.score'=>'required',
            'spot_review.comment'=>'required|string|max:4000',
        ];
    }
}
