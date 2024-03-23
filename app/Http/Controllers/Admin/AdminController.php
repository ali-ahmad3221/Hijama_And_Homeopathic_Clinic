<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Patient;
use App\Models\Admin\Medicine;
use App\Models\Admin\Equipment;


class AdminController extends Controller
{

    public function signupUser(){
        if(!auth()->user()){
            return view('admin.auth.signup');
        }
        else {
             return redirect()->back();
        }
    }

    public function registerUser(Request $request){

        $validator =  Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|same:cpassword'
        ],
        [
            'name.required' =>      __('get_validations.name_req'),
            'password.required'=>   __('get_validations.password_req'),
            'password.min' =>       __('get_validations.password_min'),
            'email.required' =>     __('get_validations.email_req'),
            'email.email' =>        __('get_validations.email_'),
            'email.unique' =>       __('get_validations.email_unique'),
        ]
        );

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('user.login')->with('msg', 'yOu are registered NOw please signin');

    }

    public function loginUser(){
        $userid = auth()->user();
        if($userid){
            return redirect()->back();
        }
        return view('admin.auth.login');
    }


    public function loginUserSubmit(Request $request){
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ],
        [
            'email.required' =>     __('get_validations.email_req'),
            'email.email' =>        __('get_validations.email_'),
            'password.required'=>   __('get_validations.password_req'),
            'password.min' =>       __('get_validations.password_min'),

        ]
        );
        if (!Auth::attempt($attr)) {
            return redirect()->back()->withErrors($attr)->withInput();
        }


        // $rememberme = $request->remember;
        if(Auth::attempt($attr))
        {
            if($request->remember)
            {
                Cookie::queue('user_cookie', encrypt($request->remember.$request->password), 43200);
                auth()->user()->remember_token = $request->remember;
                auth()->user()->update();
            } else
            {
                Cookie::queue('user_cookie', encrypt(0), -43200);
                auth()->user()->remember_token = 0;
                auth()->user()->update();
            }
            return redirect()->route('admin.dashboard');
        }
    }

    public function adminDashboard(Request $request){
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
        else {
            $data['patients']   = Patient::count();
            $data['medicines']  = Medicine::count();
            $data['equipments'] = Equipment::count();
            $data['income']     = 22;
            return view('welcome', $data);
        }
    }


    public function Profile(Request $request){
        return view('admin.pages.profile');
    }


    public function logout(Request $request){
        Auth::logout();
        if(!auth()->user()){
            return redirect()->route('user.login');
        }
        else {
             return redirect()->back();
        }
    }



}
