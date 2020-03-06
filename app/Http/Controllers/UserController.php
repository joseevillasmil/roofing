<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        $users = User::orderBy('email')->get();
        return response()->json($users);
    }

    function store(Request $request) {
        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json($user);
    }

    function update(Request $request, $id){
        $user = User::find($id);
        $user->fill($request->all());
        if($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return response()->json($user);
    }

    function destroy($id){
        $user = User::find($id);
        $user->delete();
        return response()->json('ok');
    }
}
