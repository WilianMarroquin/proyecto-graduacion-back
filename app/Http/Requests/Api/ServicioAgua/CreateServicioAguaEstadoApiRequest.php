<?php

namespace App\Http\Requests\Api\ServicioAgua;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ServicioAgua\ServicioAguaEstado;



class CreateServicioAguaEstadoApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return ServicioAguaEstado::$rules;

    }
}

