<?php

namespace App\Http\Requests\Api\Residentes;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Residentes\Genero;

class UpdateGeneroApiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

         return Genero::$rules;

    }
}

