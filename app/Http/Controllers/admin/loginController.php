<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\admin;
use Session;
use Hash;

class loginController extends Controller
{
    public function index()
    {
        if(Session::has('admin')){
            return redirect('admindashboard');
        }
        return view('admin.pages.login');
    }

    public function logindata(Request $request)
    {
        if(Session::has('admin')){
            return redirect('admindashboard');
        }
        $this->validate($request, [
              'email' => 'required|email|max:100'
            , 'password' => 'required|min:6|max:16|string'
            , 
        ]);

        $admin = admin::where('email', $request->email)->first();
        if (!empty($admin->name)) {
            if (Hash::check($request->password, $admin->password)) {
                Session::put('admin', $admin);
                return redirect('admindashboard');
            } else {
                return redirect()->back()->with('error_msg', 'Invalid email address and password.');
            }
            
        } else {
            return redirect()->back()->with('error_msg', 'Invalid email address and password.');
        }
    }

    public function logout()
    {
        if (Session::has('admin')) {
            Session::forget('admin');
            return redirect('adminlogin');
        } else {
            return redirect('admindashboard');
        }
        
    }

}
