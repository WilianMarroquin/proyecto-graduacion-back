<?php

namespace App\Http\Requests\Api\ServicioAgua;

use App\Models\ServicioAgua\ServicioAgua;
use Illuminate\Foundation\Http\FormRequest;


class CreateServicioAguaApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return ServicioAgua::$rules;

    }
}

