<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use DB;
use App\product;
use App\category;
use App\image;

class productController extends Controller
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

            $all_user_products = DB::table("products")
            ->join("categories", "categories.id", "products.category_id")
            ->select("products.*", "categories.name as cat_name")
            ->where("user_id", Auth::user()->id)
            ->get(); 
    
            $images = image::where("active_status", "active")->get();
    
            return view("pages.dashboard.manage_product.show", compact("all_user_products", "images"));
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
            return redirect("login")->with("error_msg", "login to continue.");
        }
        if(!empty(Auth::user()->email_verified_at)){

            if(Auth::user()->phone == null && Auth::user()->state == null){
                return redirect("profile");
            }

            return view("pages.dashboard.manage_product.add");
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
                'price' => 'required|integer',
                'category_id' => 'required',
                'images' => 'required',
            ]);
            $id = Str::uuid();
    
            $product = new product();
            $product->id = $id;
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->user_id = Auth::user()->id;
            
    
            if($product->save() == true){
                foreach ($request->images as $image) {
                
                    $img = base64_encode(file_get_contents($image));
        
                    $productImage = new image();
                    $productImage->id = Str::uuid();
                    $productImage->image = $img;
                    $productImage->product_id = $id;
                    $productImage->save();
                    
                }
            }
            
            return redirect()->back()->with("success_msg", "New ".$product->name." product added successfully.");
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

            $product = product::find($id);
            $images = image::where("product_id", $id)->get();
            if(!empty($images)){
                foreach ($images as $img) {
                    $img->delete();
                }
            }
            $product->delete();
            return redirect()->back()->with("success_msg",  $product->name." product deleted successfully.");
        }else{
            return redirect('/home');
        }
    
    }
}
