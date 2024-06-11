<?php

namespace App\Http\Controllers;

use App\Models\User; //import this
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash; //import this for password hashing

class DashUsersController extends Controller
{
    //here create all crud logic
    public function loadAllUsers(){
        $all_users = User::all();
        return view('user.users',compact('all_users'));
    }

    public function loadAddUserForm(){
        return view('user.add-user');
    }

    public function AddUser(Request $request){
        // perform form validation here
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'roleId' => 'required|int',
            'password' => 'required|min:4|max:8',
        ]);
        try {

            User::create([
                'roleId' => (int)$request->roleId,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('users')->with('success','User Added Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail',$e->getMessage());
        }
    }

    public function EditUser(Request $request){

        // perform form validation here
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
        try {
             // update user here
            $update_user = User::where('id',$request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->route('users')->with('success','User Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail',$e->getMessage());
        }
    }

    public function loadEditForm($id){
        $user = User::find($id);

        return view('user.edit-user',compact('user'));
    }

    public function deleteUser($id){
        try {
            User::where('id',$id)->delete();
            return redirect()->route('users')->with('success','User Deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('users')->with('fail',$e->getMessage());

        }
    }
}
