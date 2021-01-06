<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\product;
use App\skill;
use App\category;
use App\contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect("/");
    }

    public function profile_upload(Request $request)
    {
        $this->validate($request, [
            'img' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

        $img = base64_encode(file_get_contents($request->img));

        $u = Auth::user();
        $u->avatar = $img;
        $u->update();

        return redirect()->back()->with("success_msg", "Profile image uploaded successful.");

    }


}
