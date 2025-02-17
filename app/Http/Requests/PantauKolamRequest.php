<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PantauKolamRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pond_name' => 'required|string|max:255',
            'fish_type' => 'required|string|max:255',
            'management_type' => 'required|string',
            'water_temp' => 'required|numeric',
            'ph_level' => 'required|numeric',
            'dissolved_oxygen' => 'required|numeric',
            'salinity' => 'required|numeric',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'pond_name.required' => 'Nama kolam harus diisi',
            'pond_name.max' => 'Nama kolam tidak boleh lebih dari 255 karakter',
            
            'fish_type.required' => 'Jenis ikan harus diisi',
            'fish_type.max' => 'Jenis ikan tidak boleh lebih dari 255 karakter',
            
            'management_type.required' => 'Jenis pengelolaan harus dipilih',
            'management_type.in' => 'Jenis pengelolaan harus berupa kolam tanah, terpal, atau bioflok',
            
            'water_temp.required' => 'Suhu air harus diisi',
            'water_temp.numeric' => 'Suhu air harus berupa angka',
            'water_temp.between' => 'Suhu air harus antara 20°C dan 35°C',
            
            'ph_level.required' => 'Level pH harus diisi',
            'ph_level.numeric' => 'Level pH harus berupa angka',
            'ph_level.between' => 'Level pH harus antara 0 dan 14',
            
            'dissolved_oxygen.required' => 'Kadar oksigen harus diisi',
            'dissolved_oxygen.numeric' => 'Kadar oksigen harus berupa angka',
            'dissolved_oxygen.between' => 'Kadar oksigen harus antara 0 dan 20 mg/L',
            
            'salinity.required' => 'Salinitas air harus diisi',
            'salinity.numeric' => 'Salinitas air harus berupa angka',
            'salinity.between' => 'Salinitas air harus antara 0 dan 40 ppt',
            
            'length.required' => 'Panjang kolam harus diisi',
            'length.numeric' => 'Panjang kolam harus berupa angka',
            'length.min' => 'Panjang kolam minimal 0.1 meter',
            'length.max' => 'Panjang kolam maksimal 1000 meter',
            
            'width.required' => 'Lebar kolam harus diisi',
            'width.numeric' => 'Lebar kolam harus berupa angka',
            'width.min' => 'Lebar kolam minimal 0.1 meter',
            'width.max' => 'Lebar kolam maksimal 1000 meter',
            
            'height.required' => 'Tinggi kolam harus diisi',
            'height.numeric' => 'Tinggi kolam harus berupa angka',
            'height.min' => 'Tinggi kolam minimal 0.1 meter',
            'height.max' => 'Tinggi kolam maksimal 100 meter'
        ];
    }
}