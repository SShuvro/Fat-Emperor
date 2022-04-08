<?php

namespace App\Http\Controllers;

use App\Models\UserModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function index()
    {
        return view('backend.login');
    }

    function checkLogin(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        $findEmailinUser = UserModal::where('email', $request->email)->first();

        if ($findEmailinUser != null) {
            if (Hash::check($request->password, $findEmailinUser->password)) {
                session()->put([
                    'name' => $findEmailinUser->name,
                    'designation' =>  $findEmailinUser->designation,
                    'phone' => $findEmailinUser->phone,
                    'email' => $findEmailinUser->email,
                    'user_type' => $findEmailinUser->user_type
                ]);

                if ($request->checked == 'true') {
                    cookie('email', $findEmailinUser->email, 1051200);
                }
                return response()->json(['status' => 'true', 'message' => 'Password is correct']);
            } else {
                return response()->json(['status' => 'false', 'message' => 'Please Enter Correct Password']);
            }
        } else {
            $findEmailinUser = UserModal::where('email', $request->email)->first();
            if ($findEmailinUser != null) {
                if (Hash::check($request->password, $findEmailinUser->password)) {
                    session()->put([
                        'name' => $findEmailinUser->name,
                        'designation' =>  $findEmailinUser->designation,
                        'phone' => $findEmailinUser->phone,
                        'email' => $findEmailinUser->email,
                        'user_type' => $findEmailinUser->user_type
                    ]);

                    if ($request->checked == 'true') { 
                        cookie('email', $findEmailinUser->email, 1051200); 
                    }

                    return response()->json(['status' => 'true', 'message' => 'Password is correct']);
                } else {
                    return response()->json(['status' => 'false', 'message' => 'Please Enter Correct Password']);
                }
            }
        }


        return response()->json(['status' => 'false', 'message' => 'Please Enter Correct Email and Password to Login']);
    }
    function logout()
    {
        session()->forget('name');
        session()->forget('designation');
        session()->forget('phone');
        session()->forget('email');
        session()->forget('user_type');
        return redirect()->route('login.view');
    }
}

