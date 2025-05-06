<?php

namespace App\Http\Requests\Api\Residentes;

use App\Models\Residentes\ResidenteTelefonoTipo;
use Illuminate\Foundation\Http\FormRequest;

class UpdateResidenteTelefonoTipoApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

         return ResidenteTelefonoTipo::$rules;

    }
}

