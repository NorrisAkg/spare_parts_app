<?php

namespace App\Core\SpareParts\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class SparePartNotFoundException extends Exception
{
    public function report()
    {
        Log::debug('Pièce non trouvée');
    }

    public function render()
    {
        return response()->json('Pièce non trouvée');
    }
}
