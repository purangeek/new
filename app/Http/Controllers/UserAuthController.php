<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;
use App\Models\Teacher;


class UserAuthController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function create(Request $request){
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|confirmed|min:5|max:12',
            'inputAddress' => 'required',
            'inputCountry' => 'required'
        ]);
        $teacher = new Teacher;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->address = $request->inputAddress;
        $teacher->country = $request->inputCountry;

        $query = $teacher->save();
        if($query){
            return back()->with('success', 'You are registered Successfully');
        }
        else{
            return back()->with('fail', 'something went wrong');
        }
    }
    function check(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        // If form validate succesfull, process login
        $teacher = Teacher::where('email', '=', $request->email)->first();
        if($teacher){
            if(Hash::check($request->password, $teacher->password)){
                $request->session()->put('LoggedUser', $teacher->id);
                return redirect('profile');
            }else{
                return back()->with('fail', 'Invalid Password');    
            }
        }else{
            return back()->with('fail', 'No Account found with this Email');
        }
    }

    function profile(){
        $user_id = session('LoggedUser');
        $user = Teacher::Where('id', $user_id)->get()->first();
        return view('admin.profile', ['LoggedTeacherInfo' => $user, '$x' => 1]);
    }
}