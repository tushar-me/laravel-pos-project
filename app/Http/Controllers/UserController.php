<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{   
    public function userRegistration ()
    {
        return view(); // Blade File
    }
    public function userStore (Request $request) 
    {
        try {
            $user = new User;
            $user->firstName  = $request->firstName;
            $user->lastName  = $request->lastName;
            $user->email  = $request->email;
            $user->mobile  = $request->mobile;
            $user->password  = $request->password;
            $user->save();
            
            return response()->json([
                "status" => "Success",
                "message" => "User Registration Successful"
            ]);
        } catch( Exception $e) {
            return response()->json([
                "status" => "failed",
                "message" => "User Registration Failed"
            ]);
        } 
    }

    public function userLogin ()
    {
        return view(); // Blade File
    }

    public function userAuthenticate(Request $request)
    {
        $count = User::where([
                    ['email', '=', $request->email],
                    ['password', '=', $request->password],
                ])->count();
        
        if( $count == 1 ) {
            $token = JWTToken::createToken($request->email);

            return response()->json([
                "status" => "Success",
                "message" => "User Login Successful",
                "token" => $token
            ]);
        }else {
            return response()->json([
                "status" => "failed",
                "message" => "Unauthorized"
            ]);
        }
        
    }
}