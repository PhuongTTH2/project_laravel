<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/company';

      public function __construct()
    {
         $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('admin.login');
    } 
    protected function guard(){
          // dd('bbb');
        return Auth::guard('admin');
    }

     public function login(Request $request){
        if (Auth::guard('admin')->attempt(['account' => $request->account, 'password' => $request->password], $request->remember)) {
            return redirect()->route('administrators.index');
        } else {
            return redirect()->back()->withInput();
        }
    } 

     public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
