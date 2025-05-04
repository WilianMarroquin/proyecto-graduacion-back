<?php

namespace App\Http\Requests\Api\Direcciones;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Direcciones\ComunidadBarrio;



class CreateComunidadBarrioApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return ComunidadBarrio::$rules;

    }
}

