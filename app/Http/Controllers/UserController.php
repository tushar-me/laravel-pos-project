<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{   
    public function UserRegistration ()
    {
        return view();
    }
    public function UserStore (Request $request) 
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
}