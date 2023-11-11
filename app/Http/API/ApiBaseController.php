<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiBaseController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function successResponse(string $message = "Succès", int $code = 200, $data = [])
    {
        return response()->json([
            'data' => $data,
            'is_success' => true,
            'success_message' => $message,
        ], $code);
    }

    public function errorResponse(
        string $message = "Une erreur s'est produite ! Veuillez réessayer",
        int $code = 500,
        $data = []
    ) {
        return response()->json([
            'data' => $data,
            'is_success' => false,
            'error_message' => $message,
        ], $code);
    }
}
