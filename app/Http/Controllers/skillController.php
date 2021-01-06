<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\skill;
use App\category;
use Auth;
use DB;

class skillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        if(empty(Auth::user()->id)){
            return redirect("login")->with("error_msg", "login to continue.");
        }
        if(!empty(Auth::user()->email_verified_at)){

            if(Auth::user()->phone == null && Auth::user()->state == null){
                return redirect("profile");
            }

            $all_user_skills = DB::table("skills")
            ->join("categories", "categories.id", "skills.category_id")
            ->select("skills.*", "categories.name as cat_name")
            ->where("user_id", Auth::user()->id)
            ->get(); 
    
            return view("pages.dashboard.manage_skill.show", compact("all_user_skills"));
        }else{
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(empty(Auth::user()->id)){

            if(Auth::user()->phone == null && Auth::user()->state == null){
                return redirect("profile");
            }

            return redirect("login")->with("error_msg", "login to continue.");
        }
        if(!empty(Auth::user()->email_verified_at)){
            return view("pages.dashboard.manage_skill.add");
        }else{
            return redirect('/home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty(Auth::user()->id)){
            return redirect("login")->with("error_msg", "login to continue.");
        }
        if(!empty(Auth::user()->email_verified_at)){

            if(Auth::user()->phone == null && Auth::user()->state == null){
                return redirect("profile");
            }            

            $this->validate($request, [
                'name' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'category_id' => 'required',
                'video_link' => 'nullable',
                'description' => 'required',
    
            ]);
    
            parse_str( parse_url( $request->video_link, PHP_URL_QUERY ), $my_array_of_vars );
            $img = base64_encode(file_get_contents($request->image));
            $v_link = "";
            if (!empty($my_array_of_vars['v'])) {
                $v_link = $my_array_of_vars['v'];
            }else{ $v_link = null; }
            $skill = new skill();
            $skill->id = Str::uuid();
            $skill->category_id = $request->category_id;
            $skill->name = $request->name;
            $skill->image = $img;
            $skill->video_link = $v_link;
            $skill->description = $request->description;
            $skill->user_id = Auth::user()->id;
            $skill->save();
            
            return redirect()->back()->with("success_msg", "New ".$skill->name." skill added successfully.");
        }else{
            return redirect('/home');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty(Auth::user()->email_verified_at)){

            if(Auth::user()->phone == null && Auth::user()->state == null){
                return redirect("profile");
            }

            $skill = skill::find($id);
            $skill->delete();
            return redirect()->back()->with("success_msg",  $skill->name." skill deleted successfully.");
        }else{
            return redirect('/home');
        }
    
    }
}
