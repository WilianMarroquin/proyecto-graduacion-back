<?php

namespace App\Http\Requests\Api\Residentes;

use App\Models\Residentes\Residente;
use Illuminate\Foundation\Http\FormRequest;


class CreateResidenteApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Residente::$rules;
    }

    public function messages()
    {
        return Residente::$messages;
    }
}

