<?php

namespace App\Http\Requests\Api\Direcciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Direcciones\ComunidadBarrioDireccion;



class CreateComunidadBarrioDireccionApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return ComunidadBarrioDireccion::$rules;

    }
}

