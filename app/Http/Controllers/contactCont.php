<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\User;
use DB;
use Illuminate\Http\Response;



class contactCont extends Controller
{
    //
    public function addContact(){
        return view('addcontact');
    }
    
    public function addContactForm(Request $request) {
        $errorMsg = [
            'name.required'=>'من فضلك ادخل الاسم',
            'phone.numeric'=>'من فضلك ادخل رقم هاتف صحيح',
            'phone.min'=>'رقم الهاتف يجب ان يكون اكبر من 10 ارقام'
        ];
        $this->validate($request,[
            'name'=>'required|max:100',
            'phone'=>'numeric|min:10',
        ],$errorMsg);
        
        $contact = new Contact ();
        
        $contacts = Contact::latest()->get(); 
        $contact->user_id = Auth::id();
        $contact->name=$request->input('name');
        $contact->phone=$request->input('phone');
        if(Auth::user() != $contact->user){
            return redirect()->back();
        }
        $contact->save();
        return redirect('home')->with('contacts',$contacts);
    }
    
    public function deleteContact($id){
        

        $contact = Contact::where('id',$id)->first();
        if(Auth::user() != $contact->user){
            return redirect()->back();
        }
        $contact->delete();
        return redirect()->route('home');
    }
    
    public function updateContact($id){
        $contact = Contact::where('id',$id)->first();
        return view('updatecontact')->with('contact',$contact);
    }
    
    public function updateContactForm(Request $request,$id){
       
       $errorMsg = [
            'name.required'=>'من فضلك ادخل الاسم',
            'phone.numeric'=>'من فضلك ادخل رقم هاتف صحيح',
            'phone.min'=>'رقم الهاتف يجب ان يكون اكبر من 10 ارقام'
        ];
        $this->validate($request,[
            'name'=>'required|max:100',
            'phone'=>'numeric|min:10',
        ],$errorMsg);
       
        $contact = Contact::findOrFail($id);
       
        $contact->name=$request->input('name');
        $contact->phone=$request->input('phone');
        if(Auth::user() != $contact->user){
            return redirect()->back();
        }
        $contact->update();
        return redirect('home');
    }
    
    public function searchContact(Request $request){
        
        $errorMsg = [
            'searchkey.required'=> 'من فضلك ادخل الاسم او الرقم',
        ];
        $this->validate($request,[
            'searchkey'=>'required|max:100',
        ],$errorMsg);
        
        $searchTerm = $request->input('searchkey');
        $user = User::latest()->get();

        $contacts = DB::select( DB::raw("SELECT * FROM `contacts` WHERE `user_id` = '".auth()->id()."' AND
        ( `name` LIKE '%".$searchTerm."%' OR `phone` LIKE '%".$searchTerm."%')"));
        
        return view('searchContact')->with('contacts',$contacts);
    }
    
//    public function searchContactapi(){
//
//        $contctTerm=$_REQUEST['searchTerm'];
//        header('Content-Type:application/json; charset=utf-8');
//        $contacts = DB::select( DB::raw("SELECT * FROM `contacts` WHERE `user_id` = 1 AND
//        ( `name` LIKE '%".$contctTerm."%' OR `phone` LIKE '%".$contctTerm."%')"));
//        if(empty($contacts)){
//            return json_encode(["status"=>"02","message"=>"no contacts"]);
//            exit();
//        }
//            
//           
//        return response()->json($contacts, 200, [], JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
//
//        
//
//    }
}
