<?php

namespace App\Core\Pictures\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class PictureNotFoundException extends Exception
{
    public function report()
    {
        Log::debug('Image non trouvée');
    }

    public function render()
    {
        return response()->json('Image non trouvée');
    }
}