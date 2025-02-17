<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePondRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'water_temp' => 'required|numeric',
            'ph_level' => 'required|numeric',
            'dissolved_oxygen' => 'required|numeric',
            'salinity' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'water_temp.required' => 'Water temperature is required',
            'water_temp.numeric' => 'Water temperature must be a number',
            'ph_level.required' => 'pH level is required',
            'ph_level.numeric' => 'pH level must be a number',
            'dissolved_oxygen.required' => 'Dissolved oxygen is required',
            'dissolved_oxygen.numeric' => 'Dissolved oxygen must be a number',
            'salinity.required' => 'Salinity is required',
            'salinity.numeric' => 'Salinity must be a number'
        ];
    }
}
