<?php

namespace App\Http\Requests\Points;

use Illuminate\Foundation\Http\FormRequest;

class PointNearRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'x' => 'required|numeric|min:0|max:4294967295',
            'y' => 'required|numeric|min:0|max:4294967295',
            'distance' => 'required|numeric|min:1',
            'hour' => 'sometimes|date_format:H:i'
        ];
    }
}
