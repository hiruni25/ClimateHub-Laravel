<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\JoinUs;
use Illuminate\Support\Facades\DB;

class EditDataController extends Controller
{
    public function getUsers(){
        return response()->json(User::all(), 200);
    }


    public function getUsersById($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message'=> 'User Not Found'], 404);
        }
        return response()->json($user::find($id), 200);
    }

    public function addUsers(Request $request){
        $joinUs = JoinUs::create($request->all());
        return response($joinUs, 201); 
    }

    public function displayUsers(){
        return response()->json(JoinUs::all(), 200);
    }

    public function displayUsersById($id){
        $joinUs = JoinUs::find($id);
        if(is_null($joinUs)){
            return response()->json(['message'=> 'User Not Found'], 404);
        }
        return response()->json($joinUs::find($id), 200);
    }

    public function clearUsers(Request $request, $id){
        $joinUs = JoinUs::find($id);
        if(is_null($joinUs)){
            return response()->json(['message'=> 'User Not Found'], 404);
        }
        $joinUs->delete();
        return response()->json(null, 204);
    }


    public function updateUsers(Request $request, $id){
        $user= User::find($id);
        if(is_null($user)){
            return response()->json(['message' => 'User Not Found'], 404);
        }
        $user->update($request->all());
        return response($user, 200);
    }


    public function deleteUsers(Request $request, $id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['message'=> 'User Not Found'], 404);
        }
        $user->delete();
        return response()->json(null, 204);
    }
}
