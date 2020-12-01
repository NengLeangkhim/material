<?php

namespace App\Http\Controllers\api;

use App\User;
use App\Http\Controllers\Controller;
use App\model\api\UserLoginDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    public function guard()
    {
        return Auth::Guard();
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // return response()->json(compact('token'));
        $loggedUser = $this->guard()->user();
        if($loggedUser->is_deleted || !$loggedUser->status || $loggedUser->ma_user_login_is_deleted || !$loggedUser->ma_user_login_status){
            return response()->json(['message'=>'blocked'], 403);
        }
        // save login log
        UserLoginDetail::saveLoginDetail($loggedUser->id);
        return response()->json(['token'=>$token]);
    }

    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function getAuthenticatedUser()
    {
            try {
                if (! $user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
                }
            } catch (TokenExpiredException $e){
                return response()->json(['token_expired' => $e->getMessage()], 400);
            } catch (TokenInvalidException $e){
                return response()->json(['token_expired' => $e->getMessage()], 400);
            } catch (JWTException $e){
                return response()->json(['token_expired' => $e->getMessage()], 400);
            }

            return response()->json(compact('user'));
    }

    public function logout(Request $request)
    {
        config([
            'jwt.blacklist_enabled' => true
        ]);
        // \Cookie::forget('token');
        // Auth::logout();
        JWTAuth::invalidate(JWTAuth::parseToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    public static function getUserId(){
        try {
            if(!$user = JWTAuth::parseToken()->authenticate()) {
                return 0;
            }
        } catch(Exception $e){
            return 0;
        }
        return $user->id;
    }
}
