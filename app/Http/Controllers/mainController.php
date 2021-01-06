<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\product;
use App\skill;
use App\category;
use App\contact;
use App\rating;
use App\User;
use App\Mail\ContactDetails;
use Illuminate\Support\Facades\Mail;

class mainController extends Controller
{

    public function category($id, $type)
    {
        $skills   = [];
        $products = [];
        
        $category_name = category::find($id)->name;
        if($type == "product"){
            $products = product::where("category_id", $id)->paginate(12);
            return view("pages.category_products", compact("products", "category_name"));
       }else if($type == "skill"){
           
            $skills = skill::where("category_id", $id)->paginate(12);
            return view("pages.category_skills", compact("skills", "category_name"));
       }


    }

    // Contact
    public function getContactData(Request $request)
    {
        $this->validate($request, [
              'name' => 'required|min:3|max:25'
            , 'email' => 'required|max:100'
            , 'subject' => 'required|min:5|max:40'
            , 'message' => 'required|min:10|max:150'
            ,  
        ]);

        $contact = new contact();
        $contact->id = Str::uuid();
        $contact->name = $request->name; 
        $contact->email = $request->email; 
        $contact->subject = $request->subject; 
        $contact->message = $request->message; 
        $contact->save();
        
        Mail::to("qwopa08@gmail.com")->send(new ContactDetails($contact)); 
        
        return redirect()->back()->with("msg", "Mr/Mrs ".$request->name." your contact info submitted successfully, we will response you asap.");
    }

    public function rating(Request $req)
    {
        if(!empty(Auth::user())){

            $this->validate($req, [
                  'rating' => 'required|min:0.5|max:5'
                , 'comment' => 'required|string|min:4|max:120'
                , 
            ]);

            $rating = new rating();
            $rating->id = Str::uuid();
            $rating->stars = $req->rating;
            $rating->comment = $req->comment;
            $rating->product_id = $req->product_id;
            $rating->user_id = Auth::user()->id;
            $rating->save();
            return redirect()->back();
            
        }else{
            return redirect('login');
        }
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
              'phone' => 'required|string|max:13|min:13'
            , 'state' => 'required|string|min:5'
            , 'wa_phone' => 'nullable|string|max:13|min:13'
            , 'skype_id' => 'nullable|string|min:3'
            , 'profile_info' => 'nullable|string|min:10'
            , 
        ]);

        $user = User::find(Auth::user()->id);
        $user->phone = $request->phone;
        $user->state = $request->state;
        $user->wa_phone = $request->wa_phone;
        $user->skype_id = $request->skype_id;
        $user->profile_info = $request->profile_info;
        $user->save();

        return redirect()->back()->with('msg', 'Profile saved successfully.');
    }

}
