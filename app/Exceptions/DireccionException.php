<?php

namespace App\Exceptions;

use App\Http\Controllers\AppBaseController;
use Exception;

class DireccionException extends Exception
{
    public function __construct(string $message = "Ha ocurrido un error")
    {
        parent::__construct($message);
    }

    public function render()
    {

        $response = new AppBaseController();

        return $response->sendError($this->message);
    }

}
