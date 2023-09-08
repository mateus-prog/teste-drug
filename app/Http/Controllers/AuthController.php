<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\HttpStatus;
use App\Traits\HttpResponses;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            $user = $request->user();
            $access = $user->level == 'Gerente1'
            ? ['read-group', 'create-client', 'delete-client']
            : ['create-group', 'edit-group', 'delete-group'];

            return $this->response('Autorizado', HttpStatus::SUCCESS, [
                'token' => $request->user()->createToken('API Token', $access)->plainTextToken
            ]);
        }
        return $this->error('Não Autorizado', HttpStatus::UNAUTHORIZED);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->response('Token Revoked', HttpStatus::SUCCESS);
    }
}
