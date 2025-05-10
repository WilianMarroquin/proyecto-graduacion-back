<?php

namespace App\Http\Requests\Api\ServicioAgua;

use App\Models\ServicioAgua\ServicioAguaBitacora;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServicioAguaBitacoraApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

         return ServicioAguaBitacora::$rules;

    }
}

