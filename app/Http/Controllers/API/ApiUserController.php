<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->only('name', 'email', 'password', 'c_password');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Validation Error', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return $this->sendResponse($user, 'User created successfully', Response::HTTP_CREATED);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Validation Error', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return $this->sendError([], "Login credentials are invalid.",Response::HTTP_BAD_REQUEST);
            }
        } catch (JWTException $e) {
            return $this->sendError([], "Could not create token.",Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return $this->sendResponse($token, 'User has been logged in.', Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'Validation Error', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            JWTAuth::invalidate($request->token);
            return $this->sendResponse([], 'User has been logged out.', Response::HTTP_OK);
        } catch (JWTException $exception) {
            return $this->sendError([], "Sorry, user cannot be logged out",Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        $user = JWTAuth::authenticate($request->token);
        return $this->sendResponse($user, 'User has been data retrieved.', Response::HTTP_OK);
    }
}
