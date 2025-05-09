<?php

namespace App\Http\Requests\Api\ServicioAgua;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ServicioAgua\ServicioAguaBitacoraTipoTransaccion;

class UpdateServicioAguaBitacoraTipoTransaccionApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

         return ServicioAguaBitacoraTipoTransaccion::$rules;

    }
}

