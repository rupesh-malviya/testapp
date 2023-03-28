<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\User;
use App\Models\UserToCompany;
use Illuminate\Http\Request;
use Validator;
class CompanyController extends Controller
{   
    // view company list
    function index(){
        $data['company'] = Company::all();
        return view('company.index',$data);
    }

    //add Company
    function create(){
        return view('company.create');
    }

    //store company
    function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

    try{
        $User = new Company;
        $User->name = $request->name;
        $User->user_id = " ";
        $User->save();
        return redirect('/company')
        ->with('success','Company has been created successfully.');
         } 
        catch (Exception $e) {        
            
            return Redirect::back()->withErrors( $e->getMessage());
        }
    }
    // edit seleted Company 
    function edit(Request $request ,$id){
        try {
        $data['company'] = Company::where('id',$id)->get();
        return view('company.edit',$data);
         } catch (ModelNotFoundException $e) {
            return Redirect::back()->withErrors(['msg', 'Record Not Found']);
        }
    }

    //update edit Company
    function update(Request $request){

        $request->validate([
            'name' => 'required',
        ]);
          try{
        $User = Company::find($request->hdnID);;
        $User->name = $request->name;
        $User->save();
        return redirect(route('company.index'))
        ->with('success','Company has been updated successfully.');
         }
        catch (ModelNotFoundException $e) {
            return Redirect::back()->withErrors( ' Not Found');
        } 

    }

    // Delete company
    public function show(Request $request,$id)
    {
         try {
        $opening = Company::where('id',$id)->delete();
        return redirect(route('company.index'))
        ->with('success','Company has been deleted successfully.');
          } 
        catch (Exception $e) {           
             return Redirect::back()->withErrors(['msg', 'Pages Not Found']);
        }
    }

// selected user for add in selected company
    function userToCompany(Request $request){
        $data['company_id'] = $request->id;
        $data['users'] = User::all();
        return view('company.addUserToCompany',$data);
    }

//  connect user to Company
    function connectUserToCompany(Request $request){
        $userID = $request->hdn_user_id;
        foreach($userID as $key => $value){
            if(isset($request->chk[$key])){
                $User = new UserToCompany;
                $User->company_id = $request->company_id;
                $User->user_id = $userID[$key];
                $User->save();
            }
        }

        return redirect(route('company.index'))
        ->with('success','User has been added successfully in company.');
    }
    // view company added user
    function viewCompanyUser(Request $request){
        $data['comanduser'] = UserToCompany::where('company_id',$request->id)->get();
        return view('company.viewCompanyUser',$data);
    }

}
