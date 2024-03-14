<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tblvehicle;
use App\Models\tblsubscriber;
use App\Models\tblbooking;
use App\Models\tblcontact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class usercontroller extends Controller
{
    function home(){
        $fetchrecord = tblvehicle::all();
        return view('home',['countrow'=>$fetchrecord]);
    }

    function about(){
        return view('about');
    }

    function contact(){
        return view('contact');
    }

   function contactreq(Request $request){
    $request->validate(['strName'=>'required',
    'Mobile'=>'required|size:10',
    'strComment'=>'required'
    ]);

    $a = new tblcontact();
    $a->name=$request->strName;
    $a->mobile_no=$request->Mobile;
    $a->comment=$request->strComment;
    $a->save();
    return redirect()->back()->with('status','We will be in touch with you shortly');

   }
    function faq(){
        return view('faq');
    }

    function submit(Request $request)
    {
        $data= new tblsubscriber;
        $data->email=$request->strMessage;
        $data->save();

    }
    //Funtion to display and book vehicle detail after click on home page
    function vehicledetail($id = null){
        try {
            if ($id !== null) {
                $a = tblvehicle::findOrFail($id);
                return view('vehicledetail', ['vdetail' => $a]);
            } else {
                // Handle the  when no ID is provided
                return redirect()->route('home');
            }
        } catch (ModelNotFoundException $e) {
            // Handle when the vehicle with the provided ID is not found if id given by route
            return redirect()->route('home');
        }
    }
        function bookingreceipt(){
            return view ('bookingreceipt'); 
        }

        function bookingreceiptreq(REQUEST $request){
            $request->validate([
                'email' => 'required|email',
                'name' => 'required',
                'mobile' => 'required|regex:/^\d{10}$/',
            ]);
          
            //store input field inside variable
            $email = $request->input('email');
            $name = $request->input('name');
            $mobile = $request->input('mobile');
           
            //fetch record from db
            $record = tblbooking::where('email', $email)
            ->where('name', $name)
            ->where('mobile', $mobile)
            ->first();
            if ($record) {
                // If record is found, redirect to a view with the record data
                return view('bookingreceiptreq')->with('data', $record);
            } else {
                // If record is not found, return a message
                return redirect()->back()->with('status','Sorry Record Not Found Please try after some time if Payment Successfully');
            }
            
        }



/*  This is used without Payment Integration to store bookin detail in db
    function vehicle_booking(REQUEST  $req){
        $a = new tblbooking;
        $bookingId = 'BK' . mt_rand(10000, 99999);                         //Str::random(6); string
        $a->booking_id=$bookingId;
        $a->name=$req->name;
        $a->email=$req->email;
        $a->vehicle_id=$req->vehicle_id;
        $a->mobile=$req->number;
        $a->message=$req->comment;
        $a->date=$req->date;
        $a->time=$req->time;
        $a->amount=$req->button_name;
        $a->payment_status= false;  // send through form hidden
        $a->status=  false;                           //send through form hidden
        $result = $a->save();
        
        
        //Session::put('page_accessed', true); it can create for all
        if(!$result){
          return back()->with('error','Sorry Something Went Wrong') ;
        }
        return redirect()->route('vehicle_booking_view', ['id' => $a->id])->with('flash','Session Expired');//we get the id primary key same as pass in route


    }

    function vehicle_booking_view($id){
        if (Session::get('flash')){    //has flash 
            $a=tblbooking::find($id);
            return view('booking_detail_display', ['booking_detail' => $a]);   
       
        }
    
      
    }
*/
   







}
