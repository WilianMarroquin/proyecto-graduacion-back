<?php

namespace App\Http\Requests\Api\Direcciones;

use App\Models\Direcciones\Comunidad;
use Illuminate\Foundation\Http\FormRequest;

class UpdateComunidadApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

            return Comunidad::$rules;

    }
}

