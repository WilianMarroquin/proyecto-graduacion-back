<?php

namespace App\Http\Requests\Api\admin\Configuraciones;

use App\Models\Configuracion;
use Illuminate\Foundation\Http\FormRequest;


class CreateConfiguracionApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

           return Configuracion::$rules;

    }
}

