<?php

namespace App\Core\Pictures\Exceptions;

use App\Core\SpareParts\SparePart;
use Exception;

class MaxPicturesException extends Exception
{
    public function __construct(protected $message = 'Vous ne pouvez pas ajouter plus de ' . SparePart::MAX_PICTURES . ' images à un service')
    {
    }

    public function render($request)
    {
        $response = ["message" => $this->message];
        return response()->json($response, 422);
    }
}
