<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{   
    // all user list
    function index(){
        $data['user'] = User::all();
        return view('users.index',$data);
    }

    // create new user
    function addUser(){
        return view('users.create');
    }

    // user save in database
    function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        
        $User = new User;
        $User->name = $request->name;

        $User->save();
        return redirect(route('/userlist'))
        ->with('success','User has been created successfully.');
    }

    // edit selected user
    function editUser(Request $request){
        // return $request;
        $data['user'] = User::where('id',$request->id)->get();
        return view('users.edit',$data);

    }

    // update selected user
    function user_update(Request $request){
        // return $request;
        $request->validate([
            'name' => 'required',
           ]);
          // dd($request->all());
           $User = User::find($request->hdnID);;
           $User->name = $request->name;
           $User->save();
           return redirect('user-list')
          ->with('success','User has been updated successfully.');
        
    }
    // delete selected user
    public function destroy(Request $request)
    {
         $opening = User::where('id',$request->id)->delete();
         return redirect('user-list')
          ->with('success','User has been deleted successfully.');
    }
}
