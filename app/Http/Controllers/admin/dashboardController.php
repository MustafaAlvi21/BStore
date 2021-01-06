<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Session;
use App\itemsSlider;
use DB;

class dashboardController extends Controller
{
    public function index()
    {
        if(!Session::has('admin')){
            return redirect('adminlogin');
        }
        return view('admin.pages.dashboard');
    }

    public function slider()
    {
        if(!Session::has('admin')){
            return redirect('adminlogin');
        }

        $slides = DB::table('items_sliders')
        ->join('admins', 'admins.id', '=', 'items_sliders.admin_id')
        ->select('items_sliders.*', 'admins.name as admin')
        ->get();

        return view('admin.pages.manage_slider', compact('slides'));
    }

    public function sliderData(Request $request)
    {
        if(!Session::has('admin')){
            return redirect('adminlogin');
        }
        $this->validate($request, [
            'images' => 'required'
        ]);
        
        if(!empty($request->images)){
            $msg = false;
            foreach ($request->images as $image) {
                $img = base64_encode(file_get_contents($image));

                $slide = new itemsSlider();
                $slide->id = Str::uuid();
                $slide->slide = $img;
                $slide->type = $request->type;
                $slide->admin_id = Session::get('admin')->id;
                $slide->save();
                $msg = true;
            }
            if ($msg == true) {
                return redirect()->back()->with('success_msg', 'New slider with '.$request->type.' type added successfully');
            } else {
                return redirect()->back()->with('error_msg', 'Something went wrong, please check and try again.');
            }
        }


    }

    public function deleteSlider($id)
    {
        if(!Session::has('admin')){
            return redirect('adminlogin');
        }

        $slide = itemsSlider::find($id);
        $slide->delete();
        return redirect()->back()->with('success_msg', 'Slider deleted successfully');

    }

}
