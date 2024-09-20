<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReadSpotMasterRequest extends FormRequest
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
            'read_spot_master_search.category_id' =>'required_without_all:read_spot_master_search.prefecture_id,read_spot_master_search.favorite'
        ];
    }
}
