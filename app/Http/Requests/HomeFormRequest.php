<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'name' => 'required',
            'ip-address' => 'required|numeric|between:0,254',
            'port' => 'nullable'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.required' => 'Bitte geben sie eine Namen an!',
            'ip-address.required' => 'Bitte geben sie eine IP-Adresse an!',
            'ip-address.numeric' => 'Geben sie bitte eine Zahl an!',
            'ip-address.between' => 'Die IP-Adresse darf nur zwischen 1 und 254 liegen!',
        ];
    }
}
