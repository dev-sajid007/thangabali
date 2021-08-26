<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
class UserController extends Controller
{
    public function index(){

        $users= User::all();
        return view('admin.user.userLIst',compact('users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:users|max:25',
            'email' => 'required|unique:users|max:25',
            'password' => 'required|:users|min:8',
        ]);
        $user = new User;
        $user->user_type = $request->role_type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);

        $user->save();

        if($user->save()){
             //notification
            $notification = array(
                'message' =>'User Add Successfully',
                'alert-type' =>'info'
                );
            return redirect()->route('user.list')->with($notification);
        }else{
            $notification = array(
                'message' =>'There was an error',
                'alert-type' =>'error'
                );
            return redirect()->route('user.list')->with($notification);
        }

    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.user.userEdit',compact('users'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|max:35',
        ]);
        $user = User::find($id);
        $user->user_type = $request->role_type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();
        return redirect()->route('user.list')->with('message', 'User Updated Successfully');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        //notification
        $notification = array(
            'message' =>'User Delete Successfully',
            'alert-type' =>'error'
             );
        return redirect()->route('user.list')->with($notification);
    }
}
