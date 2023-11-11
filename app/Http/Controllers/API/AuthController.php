<?php

namespace App\Http\Controllers\API;

use App\Core\Users\Repositories\Interfaces\UserRepositoryInterface;
use App\Core\Users\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiBaseController
{
    /**
     * Create a new controller instance.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        private UserRepositoryInterface $userRepo
    ) {}


    /**
     * Log user in
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt($request->only(["email", "password"]))) {
            // Get the user
            $user = $request->user();

            // Check if user can login and proceed
            if (is_null($user->email_verified_at))
                return $this->errorResponse(
                    "Vous devez vérifier votre compte avant de pouvoir vous connecter",
                    403,
                    []
                );

            // Generate token and send response
            $token =  $user->createToken('userToken')->plainTextToken;

            return $this->successResponse(
                "Connexion effectuée avec succès !",
                200,
                [
                    "user"  => $user,
                    "token" => $token
                ]
            );
        } else
            return $this->errorResponse("Identifiants incorrects", 422, []);
    }


    /**
     * Logout user
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();
        // Deconnect the user
        if ($user->currentAccessToken()->delete()) {
            return $this->successResponse("Déconnexion effectuée avec succès !");
        } else
            return $this->errorResponse();
    }
}
