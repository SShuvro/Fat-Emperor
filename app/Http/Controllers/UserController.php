<?php

namespace App\Http\Controllers;

use App\Models\AdminModal;
use App\Models\AdminUserTypeModal;
use App\Models\UserModal;
use App\Models\UserTypeModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function index()
    {
        $tmpUsers = UserModal::where([
            ['user_type', '>', 1],
            ['status', '>', 0]
        ])->orderBy('id', 'ASC')->get();
        $users = array();
        $tmpValue = array();
        foreach ($tmpUsers as $tmpUser) {
            $tmpValue['id'] = $tmpUser->id;
            $tmpValue['name'] = $tmpUser->name;
            $tmpValue['email'] = $tmpUser->email;
            $tmpValue['phone'] = $tmpUser->phone;
            $tmpValue['designation'] = $tmpUser->designation;

            $usertype = UserTypeModal::find($tmpUser->user_type);

            $tmpValue['user_type'] = $tmpUser->user_type;
            $tmpValue['user_type_name'] = $usertype->name;
            $tmpValue['created_at'] = $tmpUser->created_at;
            $tmpValue['created_by'] = $tmpUser->created_by;
            $tmpValue['deleted_at'] = $tmpUser->deleted_at;
            $tmpValue['deleted_by'] = $tmpUser->deleted_by;
            $tmpValue['notification'] = $tmpUser->notification;
            $tmpValue['status'] = $tmpUser->status;

            array_push($users, $tmpValue);
        }

        $usertypes = UserTypeModal::where([
            ['id', '>', 1],
            ['status', '>', 0]
        ])->orderBy('id', 'ASC')->get();

        return view('backend.user', compact('users', 'usertypes'));
    }

    function addUser(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:App\Models\UserModal,email',
            'phone' => 'required | unique:App\Models\UserModal,phone',
            'designation' => 'required',
            'password' => 'required | min:6',
            'usertype' => 'required'
        ]);

        $user = new UserModal();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->designation = $request->designation;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->usertype;
        $user->created_by = 1; //$request->session()->get('user_id'); 

        $user->save();

        return response()->json($user);
    }


    function detailsOfUser($id)
    {
        $user = UserModal::find($id);
        return response()->json($user);
    }

    function updateUser(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'designation' => 'required',
            'usertype' => 'required'
        ]);


        $userToUpdate = UserModal::find($request->id);

        $userToUpdate->name = $request->name;
        $userToUpdate->email = $request->email;
        $userToUpdate->phone = $request->phone;
        $userToUpdate->designation = $request->designation;
        $userToUpdate->user_type = $request->usertype;
        if ($request->password != "" || null) {
            $userToUpdate->password = Hash::make($request->password);
        }
        
        

        $userToUpdate->save();

        $returnArray = array();


        $tmpUser = UserModal::find($request->id);
        
        $returnArray['id'] = $tmpUser->id;
        $returnArray['name'] = $tmpUser->name;
        $returnArray['email'] = $tmpUser->email;
        $returnArray['phone'] = $tmpUser->phone;
        $returnArray['designation'] = $tmpUser->designation;

        $usertype = UserTypeModal::find($tmpUser->user_type);

        $returnArray['user_type'] = $tmpUser->user_type;
        $returnArray['user_type_name'] = $usertype->name;
        $returnArray['created_at'] = $tmpUser->created_at;
        $returnArray['created_by'] = $tmpUser->created_by;
        $returnArray['deleted_at'] = $tmpUser->deleted_at;
        $returnArray['deleted_by'] = $tmpUser->deleted_by;
        // $returnArray['notification'] = $tmpUser->notification;
        $returnArray['status'] = $tmpUser->status;

        return response()->json($returnArray);
    }


    function deleteUser(Request $request)
    {
        $userToDelete = UserModal::find($request->id);

        $userToDelete->deleted_at = date('Y-m-d H:i:s');
        $userToDelete->deleted_by = 1;  //$request->session()->get('user_id');
        $userToDelete->status = 0;

        $userToDelete->save();

        return response()->json($userToDelete);
    }
}


