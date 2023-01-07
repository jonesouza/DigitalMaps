<?php

namespace App\Http\Requests\Points;

use App\Rules\PointCoordenateRule;
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
            'x' => ['required', new PointCoordenateRule],
            'y' => ['required', new PointCoordenateRule],
            'distance' => 'required|numeric|min:1',
            'hour' => 'sometimes|date_format:H:i'
        ];
    }
}
