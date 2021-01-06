<?php
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\OrderDetails;
use App\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\wishlist;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**********************     Website     **********************/

// Main Page
Route::get('/', function () {
    return view('pages.index');
});

// Authentications
Auth::routes(["verify"=>true]);

// Home Page
Route::get('/home', 'HomeController@index')->name('home');

// Skills
Route::get("/skills", function(){
    return view("pages.skills");
});


// Products
Route::get("/products", function(){
    return view("pages.products");
});

// Product Details
Route::get("/product/{id}", function($id){
    $product = App\product::find($id);
    $user_details = App\User::where("id", $product->user_id)->first();
    return view("pages.product", compact("product", "user_details"));
});

// Skill Details
Route::get("/skill/{id}", function($id){
    $skill = App\skill::find($id);
    $user_details = App\User::where("id", $skill->user_id)->first();
    return view("pages.skill", compact("skill", "user_details"));
});

// Terms and Conditions
Route::get("/terms_conditions", function(){
    return view("pages.terms");
});

// Privacy policy
Route::get("/privacy_policy", function(){
    return view("pages.privacy policy");
});

// Contact Us
Route::get("/contact_us", function(){
    return view("pages.contact_us");
});

// Contact us data
Route::post('getContactData', 'mainController@getContactData');

// About us
Route::get("/about_us", function(){
    return view("pages.about_us");
});

// User Profile
Route::get("/profile", function(){
    if(Auth::user() == null){
        return redirect("login");
    }
    if(Auth::user()->phone == null && Auth::user()->state == null){
        return view("pages.profile");
    }
    return view("pages.profile");
});

// Update Profile
Route::post('updateProfile', 'mainController@updateProfile');

// Change Profile Pic
Route::post("profile_upload", "HomeController@profile_upload");

// Category Products & Skills
Route::get("/category/{id}/{type}", "mainController@category");

// Cart Work
Route::get("add-cart/{id}", function($id, Request $request){
    
    $product = App\product::find($id);
    $p_img = App\image::where("product_id", $product->id)->first();
    $vendor = App\User::where('id', $product->user_id)->first();
    
    if(intval($request->qty) > 1){
        
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->qty,
            'attributes' => array(
                "img" => $p_img->image
              , "vendor_id" => $product->user_id
              , "vendor_name" => $vendor->name
              , "vendor_email" => $vendor->email
             // , "user_id" => Auth::user()->id
              )
        ));
    }else{
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                  "img" => $p_img->image
                , "vendor_id" => $product->user_id
                , "vendor_name" => $vendor->name
                , "vendor_email" => $vendor->email
                // , "user_id" => Auth::user()->id
                )
        ));
    }
        

    // Empty Cart
    // Cart::clear();

    // Remove One Item From Cart
    // Cart::remove(456);
    
    return redirect()->back();
});

// Users
Route::get("users", function(){
    return view("pages.users");
});

// How it works
Route::get("/howitwork", function(){
    return view("pages.howitwork");
});

// Cart View
Route::get("my_cart", function() {
    if(!empty(Auth::user()->id)){
        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }
    
        return view("pages.my_cart");
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});

// Cart item quantity decrease
Route::get("my_cart/{id}/decrease", function($id) {
    if(!empty(Auth::user()->id)){

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        $qty =  (int)Cart::get($id)->quantity;
        if($qty == 1){
            Cart::remove($id);
        }else{
            $qty = $qty - 1;
            Cart::get($id)->quantity = $qty;
        }

        return redirect('my_cart');
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});

// Cart item quantity increase
Route::get("my_cart/{id}/increase", function($id) {
    if(!empty(Auth::user()->id)){
        
        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }
        
        $qty =  (int)Cart::get($id)->quantity;
        $qty = $qty + 1;
        Cart::get($id)->quantity = $qty;
       
        return redirect('my_cart');
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});

// Romove item form cart
Route::get("remove_item/{id}", function($id) {
    if(!empty(Auth::user()->id)){

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        $my_cart = Cart::getContent($id);
        
        foreach($my_cart as $item)
        {
            Cart::remove($id);
        }
        return redirect('my_cart');
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});

// Clear My Cart
Route::get("clear_my_cart/", function() {
    if(!empty(Auth::user()->id)){

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        Cart::clear();
       
        return redirect('my_cart');
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});


///////  Checkout step 1 ////////
// Checkout
Route::get("checkout/", function() {
    if(!empty(Auth::user()->id)){
        
        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        return view("pages.checkout");
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});
// Shipping
Route::post("checkout_shipping/", function(Request $request) {
    if(!empty(Auth::user()->id)){

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        $checkout = array(
              "name"=>Auth::user()->name
            , "email"=>Auth::user()->email
            , "phone"=>Auth::user()->phone
            , "address"=> $request->address
            , "city"=> $request->city
            , "zip_code"=> $request->zip_code
            
        );
        Session::put("checkout", $checkout);
        return redirect("checkout_review");
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});
// Review
Route::get("checkout_review/", function(Request $request) {
    if(!empty(Auth::user()->id)){
        
        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        // return Session::get("checkout.name");
        return view("pages.checkout_review");
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});
// Thank you for shopping
Route::get("thank_you_for_shopping/", function(Request $request) {
   
    if(!empty(Auth::user()->id)){

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        $c = 0;
        
        $uid = Str::uuid();
        $my_cart = Cart::getContent();

        foreach($my_cart as $item)
        {
            
            $order = new App\order();
            $order->id = Str::uuid();
            $order->order_id = $uid;
            $order->quantity = $item->quantity;
            $order->sub_total = (double)(((double) $item->price) * ((int) $item->quantity));
            $order->product_id = $item->id;
            $order->user_id = Auth::user()->id;
            $order->vendor_id = $item->attributes->vendor_id;
            
           
            if($order->save()){
                $c = 1;
            }else{
                $c = 0;
            }
        }
        if($c == 1){
            $total_p = 0;
            $order_data = App\order::where("order_id", $uid)->get(); 
            foreach($order_data as $data){
                $total_p += $data->sub_total;
            }
            $address = Session::get("checkout.address").', '.Session::get("checkout.city").' '.Session::get("checkout.zip_code")." Pakistan";

            $delivery = new App\delivery();
            $delivery->id = Str::uuid();
            $delivery->order_id = $uid;
            $delivery->total = $total_p;
            $delivery->address = $address;
            $delivery->items = Cart::getContent()->count();
            $delivery->order_date = Carbon\Carbon::today()->format('Y-m-d');
            $delivery->order_end_date = Carbon\Carbon::today()->addDays(12)->format('Y-m-d');
            

            if($delivery->save()){
                Session::put("order_id", $uid);
                Session::put("my_cart", $my_cart);
                Session::put("g_total", Cart::getSubTotal());
                Cart::clear(); 

                // Order Details email to user
                Mail::to(Auth::user()->email)->send(new OrderDetails()); 
                // Order Details email to user end


                foreach ($my_cart as $item) {
                    Session::put('orderFrom', $item->attributes->vendor_name);
                    Session::put('item', $item);
                    Session::put('user_name', Auth::user()->name);
                    Session::put('user_phone', Auth::user()->phone);
                    Session::put('user_email', Auth::user()->email);
                    
                    Mail::to($item->attributes->vendor_email)->send(new NewOrder()); 

                }
                
                return view("pages.thank_you_for_shopping", compact('uid'));
            }
        }

    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});

// Search 
Route::post("search", function(Request $request){
      
        if($request->type == "Products"){
            $products = App\product::where('name', 'like', '%' . $request->search . '%')
            ->paginate(12);
            
            $result = "";
            if(empty($request->search)){
                $result = $request->type;
            }else{
                $result = $request->search;
            }
            return view("pages.search", compact("products", "result"));
        }else if($request->type == "Skills"){
            $skills = App\skill::where('name', 'like', '%' . $request->search . '%')
            ->paginate(12);
            
            $result = "";
            if(empty($request->search)){
                $result = $request->type;
            }else{
                $result = $request->search;
            }
            return view("pages.search", compact("skills", "result"));
        }else if($request->type == "Users"){
            
            $users = App\User::where("email_verified_at", "!=", null)
            ->where("account_status", "active")
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('phone', $request->search)
            ->orWhere('email', $request->search)
            ->paginate(12);
            
            $result = "";
            if(empty($request->search)){
                $result = $request->type;
            }else{
                $result = $request->search;
            }
            return view("pages.search", compact("users", "result"));
        }
      
});

// My Orders
Route::get("my_orders/", function(Request $request) {
    if(!empty(Auth::user()->id)){
        
        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        $my_orders = DB::table('orders')
        ->where("orders.user_id", Auth::user()->id)
        ->groupBy('orders.order_id')
        ->select('orders.*')
        ->get();

        $item_counts = count(DB::table('orders')
        ->where("orders.user_id", Auth::user()->id)
        ->select('orders.*')
        ->get());
        $orders = [];
        foreach ($my_orders as $order) {
            $deliveries = App\delivery::where("order_id", $order->order_id)->first();
            if(!empty($deliveries)){
                
            $o = [
                  "id"=> $deliveries->order_id
                , "date" => $deliveries->order_date
                , "items"  => $deliveries->items
                , "total"  => $deliveries->total
                , "status"  => $order->status
                , "p_order_id"  => $order->id
                
            ];

            array_push($orders, $o);
            }
        }
        
        return view("pages.my_orders", compact("orders"));
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});

// My Order View
Route::get("my_order/{id}/view", function($id,Request $request) {
    if(!empty(Auth::user()->id)){
        if(empty(Auth::user()->id)){
            return redirect("login")->with("error_msg", "login to continue.");
        }

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        $my_orders = DB::table('orders')
        ->join('products', 'products.id', '=', 'orders.product_id')
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->where("orders.user_id", Auth::user()->id)
        ->where("orders.order_id", $id)
        // ->groupBy('orders.order_id')
        ->select('orders.*', 'orders.id as p_order_id', 'products.*', 'users.name as username')
        ->get();

        return view('pages.order_view', compact('my_orders'));
    }
});

// Customer Order View
Route::get("customer_order/{id}/view", function($id,Request $request) {
    if(!empty(Auth::user()->id)){
        if(empty(Auth::user()->id)){
            return redirect("login")->with("error_msg", "login to continue.");
        }

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        if(!empty(Auth::user()->email_verified_at)){
            $customer_orders = DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.vendor_id')
            ->where("orders.order_id", $id)
            ->where('users.id', Auth::user()->id)
            // ->groupBy('orders.order_id')
            ->select('orders.*', 'products.*', 'orders.created_at as order_date', 'users.name as username')
            ->get();
    
            return view('pages.customer_order_view', compact('customer_orders', 'id'));
        }else{
            return redirect('/home');
        }
    }
});

// Customer Orders
Route::get("customer_orders/", function(Request $request) {
    if(!empty(Auth::user()->id)){
        
        // $customer_orders = DB::table('orders')
        // ->join('products', 'orders.product_id', '=', 'products.id')
        // ->where("orders.vendor_id", Auth::user()->id)
        // ->select('orders.*')
        // ->groupBy('orders.order_id')
        // ->get();

        // $item_counts = count(DB::table('orders')
        // ->join('products', 'orders.product_id', '=', 'products.id')
        // ->where("orders.vendor_id", Auth::user()->id)
        // ->select('orders.*')
        // ->get());
        
        // $orders = [];
        // foreach ($customer_orders as $order) {
        //     $deliveries = App\delivery::where("order_id", $order->order_id)->first();
        //     if(!empty($deliveries)){
                
        //     $o = [
        //           "id"=> $deliveries->order_id
        //         , "date" => $deliveries->order_date
        //         , "items"  => $deliveries->items
        //         , "total"  => $deliveries->total
        //         , "status"  => $deliveries->delivery_status
                
        //     ];

        //     array_push($orders, $o);
        //     }
        // }
        if(!empty(Auth::user()->email_verified_at)){

            if(Auth::user()->phone == null && Auth::user()->state == null){
                return redirect("profile");
            }

            $customer_orders = DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->where("orders.vendor_id", Auth::user()->id)
            ->where("orders.status", "!=", "completed")
            ->groupBy('orders.order_id')
            ->select('orders.*')
            ->get();
            
            return view("pages.customer_orders", compact("customer_orders"));
        }else{
            return redirect('/home');
        }
    }else{
        return redirect("login")->with("error_msg", "login to continue.");
    }
});

// Manage Order
Route::get("manage_order/{id}", function($id){

    if(empty(Auth::user()->id)){

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        return redirect("login")->with("error_msg", "login to continue.");
    }
    $customer_orders = DB::table('orders')
        ->where("orders.order_id", $id)
        ->where('orders.vendor_id', Auth::user()->id)
        ->select('orders.*')
        ->get();

    $msg = "";
    $status = "";


    if($customer_orders->count() > 0){
        foreach ($customer_orders as $customer_order) {
            $order = App\order::find($customer_order->id);
            if ($order->status == 'pending') {
                $order->status = 'processing';
                $order->update();
                $status = 'processing';
                $msg    = 'Order marked as '.$status.' successfully. Order ID #'.$order->order_id;
            }else if ($order->status == 'processing') {
                $order->status = 'shipped';
                $order->update();
                $status = 'shipped';
                $msg    = 'Order marked as '.$status.' successfully. Order ID #'.$order->order_id;
            }else if ($order->status == 'shipped') {
                $order->status = 'completed';
                $order->update();
                $status = 'completed';
                $msg    = 'Order marked as '.$status.' successfully. Order ID #'.$order->order_id;
            }

        }

        return redirect()->back()->with('msg', $msg);
    }

});

// Mark order as completed (by Customer)
Route::get("manage_order/{id}/customer", function($id){

    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }

    if(Auth::user()->phone == null && Auth::user()->state == null){
        return redirect("profile");
    }

    $msg = "";
    $status = "";
    $order = App\order::find($id);
    if (!empty($order->id)) {
        if ($order->status == 'shipped') {
            $order->status = 'completed';
            $order->update();
            $status = 'completed';
            $msg    = 'Order marked as '.$status.' successfully. Order ID #'.$order->order_id;
        }
    }
    return redirect()->back()->with('msg', $msg);
    
});

// Exchange product
Route::post("exchange/{id}/product", function($id, Request $request){

    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }

    if(Auth::user()->phone == null && Auth::user()->state == null){
        return redirect("profile");
    }

    $product = App\product::where('id', $id)->first();

    $exchange = new App\exchange();
    $exchange->id = Str::uuid(); 
    $exchange->product_id = $product->id; 
    $exchange->user_id = Auth::user()->id; 
    $exchange->exchange_product = $request->exchange_product; 
    $exchange->exchange_user = $product->user_id; 
    $exchange->save();
    return redirect()->back()->with("msg", "Exchange request sent success to vendor.");

});

// Exchange Product Request Accept
Route::post("accept_request/{id}", function($id){

    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }

    if(Auth::user()->phone == null && Auth::user()->state == null){
        return redirect("profile");
    }

    $exchange = App\exchange::find($id);
    
    if($exchange->status == 'pending'){
        $exchange->status = 'accepted';
        $exchange->update();
        return redirect()->back();
    }else{
        return redirect('/');
    }

});

// Exchange Product Request Ignore
Route::post("ignore_request/{id}", function($id){

    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }

    if(Auth::user()->phone == null && Auth::user()->state == null){
        return redirect("profile");
    }

    $exchange = App\exchange::find($id);
    
    if($exchange->status == 'pending'){
        $exchange->status = 'ignored';
        $exchange->update();
        return redirect()->back();
    }else{
        return redirect('/');
    }

    

});

// Exchange Product View
Route::get("exchange/{id}/view", function($id){

    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }

    if(Auth::user()->phone == null && Auth::user()->state == null){
        return redirect("profile");
    }

    $exchange = (DB::table('exchanges')
    ->join('users', 'users.id', '=', 'exchanges.user_id')
    ->join('products', 'products.id', '=', 'exchanges.product_id')
    ->join('categories', 'categories.id', '=', 'products.category_id')
    ->where('exchanges.id', $id)
    ->where('exchanges.status', 'pending')
    ->select(
          'exchanges.id as exc_id'
        
          , 'users.name as v_name'
          , 'users.avatar'
          , 'users.phone'
          , 'users.email'
          , 'users.country'
          , 'users.state'
          , 'users.profile_info'
          
          , 'products.id as p_id'
          , 'products.name as p_name'
          , 'products.price as p_price'
          
          , 'categories.name as c_name'
          , 'categories.id as category_id'
          
          )

    ->get()[0]);

    $exchange_to = (DB::table('exchanges')
    ->join('users', 'users.id', '=', 'exchanges.user_id')
    ->join('products', 'products.id', '=', 'exchanges.exchange_product')
    ->join('categories', 'categories.id', '=', 'products.category_id')
    ->where('exchanges.id', $id)
    ->select(
          'exchanges.id as exc_id'
        
          , 'users.name as v_name'
          , 'users.phone'
          , 'users.email'
          , 'users.country'
          , 'users.state'
          , 'users.profile_info'
          
          , 'products.id as p_id'
          , 'products.name as p_name'
          , 'products.price as p_price'
          
          , 'categories.name as c_name'
          , 'categories.id as category_id'
          
          )

    ->get()[0]);

    return view('pages.exchange_view', compact('exchange', 'exchange_to'));
  
});

// Product Rating (user)
Route::post('user_rating', 'mainController@rating');

// Wishlist
Route::get('wishlist/{id}', function($id){
    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }

    if(Auth::user()->phone == null && Auth::user()->state == null){
        return redirect("profile");
    }

    if(!empty($id)){

        $exist_check = DB::table("wishlists")
        ->where('product_id', $id)
        ->where('user_id', Auth::user()->id)
        ->get();
        
        if($exist_check->count() < 1){
            $wishlist = new wishlist();
            $wishlist->id = Str::uuid();
            $wishlist->product_id = $id;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
            return redirect('my_wishlist');
        }else{
            return redirect()->back();
        }

    }else{
        return redirect()->back();
    }

});
// My Wishlist 
Route::get('my_wishlist', function(){
    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }

    if(Auth::user()->phone == null && Auth::user()->state == null){
        return redirect("profile");
    }

    $my_wishlists = DB::table("wishlists")
    ->join('products', 'products.id', '=', 'wishlists.product_id')
    ->select('products.id', 'products.name', 'products.price', 'wishlists.id as wishlist_id')
    ->where('wishlists.user_id', Auth::user()->id)
    ->get();
    
    return view('pages.my_wishlist', compact('my_wishlists'));
});
// Wishlist Remove item  
Route::get('wishlist/{id}/remove', function($id){
    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }

    if(Auth::user()->phone == null && Auth::user()->state == null){
        return redirect("profile");
    }

    if(!empty($id)){
        
        $my_wishlist = wishlist::find($id);
        $my_wishlist->delete();
        return redirect()->back();
    }else{
        return redirect()->back();
    }
    
});


/**********************    User Dashboard     **********************/
Route::get("dashboard", function(){

    if(empty(Auth::user()->id)){
        return redirect("login")->with("error_msg", "login to continue.");
    }
    if(!empty(Auth::user()->email_verified_at)){

        if(Auth::user()->phone == null && Auth::user()->state == null){
            return redirect("profile");
        }

        return view("pages.dashboard.index");    
    }else{
        return redirect('/home');
    }
    
});

// Manage Skills
Route::resource("add_skill",  "skillController");


// Manage Prodcut
Route::resource("add_product",  "productController");

/**********************     Administrator     **********************/
// Login
Route::get('adminlogin', 'admin\loginController@index');
// Credientials Handle
Route::post('logindata', 'admin\loginController@logindata');
// Logout
Route::get('adminlogout', 'admin\loginController@logout');

// Dashboard
Route::get('admindashboard', 'admin\dashboardController@index');

// Slider
Route::get('slider', 'admin\dashboardController@slider');
// Slider data
Route::post('sliderData', 'admin\dashboardController@sliderData');
// Delete Slider
Route::post('slider/{id}/delete', 'admin\dashboardController@deleteSlider');