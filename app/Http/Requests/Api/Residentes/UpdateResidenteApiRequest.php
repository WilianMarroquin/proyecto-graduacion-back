<?php

namespace App\Http\Requests\Api\Residentes;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Residentes\Residente;

class UpdateResidenteApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

         return Residente::$rules;

    }
}

