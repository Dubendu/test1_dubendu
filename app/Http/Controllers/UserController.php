<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('users.add');
    }

    public function store(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:App\Models\User,email',
            'contact'=>'required|unique:App\Models\User,contact',
            'city'=>'required',
            'gender'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png|max:1048',
            'status'=>'required'
        ]);
        $data=new User();
        $data->firstname=$request->firstname;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->contact=$request->contact;
        $data->city=$request->city;
        $data->gender=$request->gender;
        $data->age=$request->age;
        $data->status=$request->status;
        if($request->hasFile('image'))
        {
            $file=$request->file('image'); 
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/users/',$filename);
            $data->image=$filename;  
        }        
        $data->save();
        return redirect('/users/list');
    }
    public function show(){
    $data=User::paginate(5);
    return view('users.list',['users'=>$data]);
    }
    
    public function delete($id){
        $data=User::findOrFail($id);
        $data->delete();
        return redirect('/users/list');
    }

    public function edit($id){
        $data=User::findOrFail($id);
        return view('users.update',['user'=>$data]);
    }

    public function update(Request $request){
        
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'contact'=>'required',
            'city'=>'required',
            'gender'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png|max:1048'
        ]);
        $data=User::findOrFail($request->id);
        $data->firstname=$request->firstname;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->contact=$request->contact;
        $data->city=$request->city;
        $data->gender=$request->gender;
        $data->age=$request->age;
        if($request->hasFile('image'))
        {
            $file=$request->file('image'); 
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/users/',$filename);
            $data->image=$filename;  
        }        
        $data->save();
        return redirect('/users/list');
    }

    public function status_update($id){
        $data = DB::table('users')
        ->select('status')
        ->where('id','=',$id)
        ->first();

        if($data->status == '1'){
        $status = '0';
        }else{
        $status = '1';
        }

        $values = array('status' => $status );
        DB::table('users')->where('id',$id)->update($values);
        return redirect('/users/list');
        }

    public function checkEmail(Request $request)
        {
        if($request->get('email'))
        {
        $email = $request->get('email');
        $data = DB::table("users")
        ->where('email', $email)
        ->count();
        if($data > 0)
        {
        echo 'not_unique';
        }
        else
        {
        echo 'unique';
        }
        }
        }

    public function checkContact(Request $request)
        {
        if($request->get('contact'))
        {
        $contact = $request->get('contact');
        $data = DB::table("users")
        ->where('contact', $contact)
        ->count();
        if($data > 0)
        {
        echo 'not_unique';
        }
        else
        {
        echo 'unique';
        }
        }
        }
}
