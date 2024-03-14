<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\tblbrand;
use App\Models\tblvehicle;
use Illuminate\Support\Str;
use App\Models\admincred;
use App\Models\tblbooking;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\tblsubscriber;
use App\Models\tblcontact;

class admincontroller extends Controller
{
    function signup(){
        return view('admin.signup');

    }
    function signupreq(REQUEST $req){
        $a = new admincred;
        $validatedData=$req->validate(['Inputemail'=>'required|email|unique:admincreds,email',
                        'password'=>'required|confirmed',
                        'password_confirmation'=>'required']);
        $a->email = $req->Inputemail;
        $a->password=Hash::make($req->password);
        $a->password_confirmation = Hash::make($req->password_confirmation);
        $a->save();
        return redirect()->back()->with('status','Successfully Registered');
    }

    function signin(){
        // Check if the user is already authenticated
        if(Auth::guard('custom_web')->check()) {
            return redirect()->route('dashboard');// Redirect to the dashboard or any other page
        }
        return view('admin.signin');
    }

    function signinreq(REQUEST $req){
        $req->validate(['email'=>'required|email','password'=>'required']);
           $credentials = $req->only('email','password');
           if(Auth::guard('custom_web')->attempt($credentials)){
           return redirect()->route('dashboard');
           // intended('/dashboard');
           }  else{
            return redirect()->back()->withInput($req->only('email'))->withErrors([
                'email' => 'These credentials do not match our records.',]);
           }           
        }
    
    function signout(){
         Auth::guard('custom_web')->logout(); 
         return redirect()->route('signin'); 
    }
     
    function successmessage(){
        return view('admin.successmessage');
    }
    function dashboard(){
       // if(Auth::guard('custom_web')->check()){ //But now use inside Middleware
            $totalbrand = tblbrand::count();
            $totalvehicle = tblvehicle::count();
            $totalsubscriber = tblsubscriber::count();
            $totalcontact = tblcontact::count();
            $totalbooking = tblbooking::where('status', 0)->count();//count new booking only to accept or reject
            $completebooking = tblbooking::where('status', 1)->count();//count accepted/complete booking
            $cancelbooking = tblbooking::where('status', -1)->count();//count rejected booking
            return view('admin.dashboard',['totalbrand'=>$totalbrand,'totalvehicle'=>$totalvehicle,'totalsubscriber'=> $totalsubscriber,'totalbooking'=>$totalbooking,'completebooking'=>$completebooking,'cancelbooking'=>$cancelbooking,'totalcontact'=>$totalcontact]);
            
        //}
       // else
        //{
          //  return view('admin.signin');
        //}
    }

    function createbrands(){
        return view('admin.createbrands');   
    }

    function createbrandsreq(REQUEST $req){
        $req->validate(['brandname'=>'required']);
        $store = new tblbrand;
        $store->brandname = $req->brandname;
        $result = $store->save();
       //return redirect()->route('createbrands'); here is my custom alert box
        return redirect()->route('successmessage')->with('success', 'Done successfully');//or also return $result in place of message
    }
    function managebrands(){
        $manbrand = tblbrand::all();
        return view('admin.managebrands',['data'=>$manbrand]);
    }
    function managebrandsdelete($id){
        $a=tblbrand::find($id);
        $a->delete();
        return redirect()->back()->with('status','Vehicle Deleted Successfully');
    }
    public function managebrandsupdate($id)
    {
        $item = tblbrand::findOrFail($id);
        return view('admin.managebrandupdate', ['item' => $item]);
    }
    function managebrandsupdatereq(REQUEST $req,$id){
        $req->validate(['brandname'=>'required']);
       $vehicle = tblbrand::findOrFail($id);
       $vehicle->update($req->all());
       return redirect()->back()->with('status','Updated Successfully');
    }
    function postvehicle(){
        $branddetail=tblbrand::all();
        return view('admin.postvehicle',['brand'=>$branddetail]);
    }
    function postvehiclereq(REQUEST $req){
        $req->validate([
                'vehicletitle'=>'required',
                'selectbrand'=>'required',
                'textcomment'=>'required',
                'pricezone'=>'required|numeric',
                'fueltype'=>'required',
                'yearofmfg'=>'required|numeric',
                'seatcapacity'=>'required|numeric',
                'upload1'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'upload2'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'upload3'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'upload4'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
       $mod = new tblvehicle;
       $mod->vehicletitle = $req->vehicletitle;
       $mod->selectbrand =  $req->selectbrand;
       $mod->textcomment = $req->textcomment;
       $mod->pricezone = $req->pricezone;
       $mod->fueltype =  $req->fueltype;
       $mod->yearofmfg =  $req->yearofmfg; 
       $mod->seatcapacity = $req->seatcapacity;
    $imagename1 = Str::random(10) . time()."myname.". $req->file('upload1')->getClientOriginalExtension();
    $req->file('upload1')->storeAs('public/postvehicle',$imagename1);
    $mod->vimage1 = $imagename1;
  
    $imagename2 = Str::random(10) .time()."myname.". $req->file('upload2')->getClientOriginalExtension();
    $req->file('upload2')->storeAs('public/postvehicle',$imagename2);
    $mod->vimage2 = $imagename2;

    $imagename3 = Str::random(10) . time()."myname.". $req->file('upload3')->getClientOriginalExtension();
    $req->file('upload3')->storeAs('public/postvehicle',$imagename3);
    $mod->vimage3 = $imagename3;

    $imagename4 = Str::random(10) . time()."myname.". $req->file('upload4')->getClientOriginalExtension();
    $req->file('upload4')->storeAs('public/postvehicle',$imagename4);
    $mod->vimage4 = $imagename4;
      
       $mod->airconditioner = $req->airconditioner;
       $mod->powerdoor =  $req->powerdoor;
       $mod->antibraking = $req->antibraking;
       $mod->brakeassist = $req->brakeassist;
       $mod->powersteering = $req->powersteering;
       $mod->driverairbag =  $req->driverairbag;
       $mod->passengerairbag =  $req->passengerairbag;
       $mod->powerwindow = $req->powerwindow ;
       $mod->cdplayer = $req->cdplayer;
       $mod->centrallocking = $req->centrallocking;
       $mod->crashsensor = $req->crashsensor;
       $mod->save();
       return redirect()->back()->with('status','New Vehicle Added Successfully');
    }
    function managevehicle(){
        $manveh = tblvehicle::all();
        return view('admin.managevehicle',['data'=>$manveh]);
    }
    function postvehicledelete($id){
        $a=tblvehicle::find($id);
        $a->delete();
        return redirect()->back()->with('status','Vehicle Deleted Successfully');
    }
    public function postvehicleupdate($id)
    {
        $item = tblvehicle::findOrFail($id);
        $branddetail=tblbrand::all();
        return view('admin.postvehicleupdate', ['item' => $item,'brandselect'=>$branddetail]);
    }

    function postvehicleupdatereq(REQUEST $req,$id){
        $req->validate([
            'vehicletitle'=>'required',
            'selectbrand'=>'required',
            'textcomment'=>'required',
            'pricezone'=>'required|numeric',
            'fueltype'=>'required',
            'yearofmfg'=>'required|numeric',
            'seatcapacity'=>'required|numeric',
                      ]);
       $vehicle = tblvehicle::findOrFail($id);
       $checkbox1Value = $req->has('airconditioner') == '1' ? 1 : null; //dont compare with 1 directly ?1:null;
       $checkbox2Value = $req->has('powerdoor') ? 1 : null;
       $checkbox3Value = $req->has('antibraking') ? 1 : null;
       $checkbox4Value = $req->has('brakeassist') ? 1 : null;
       $checkbox5Value = $req->has('powersteering') ? 1 : null;
       $checkbox6Value = $req->has('driverairbag') ? 1 : null;
       $checkbox7Value = $req->has('passengerairbag') ? 1 : null;
       $checkbox8Value = $req->has('powerwindow') ? 1 : null;
       $checkbox9Value = $req->has('cdplayer') ? 1 : null;
       $checkbox10Value = $req->has('centrallocking') ? 1 : null;
       $checkbox11Value = $req->has('crashsensor') ? 1 : null;
// Handle file upload

$imagename1 = $vehicle->vimage1;
$imagename2 = $vehicle->vimage2;
$imagename3 = $vehicle->vimage3;
$imagename4 = $vehicle->vimage4;
    if($req->hasFile('upload1')) {
        $req->validate([
            'upload1' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $imagename1 = Str::random(10) . time()."changed.". $req->file('upload1')->getClientOriginalExtension();
        $req->file('upload1')->storeAs('public/postvehicle',$imagename1); 
    }
    if($req->hasFile('upload2')) {
        $req->validate([
            'upload2' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $imagename2 = Str::random(10) . time()."changed.". $req->file('upload2')->getClientOriginalExtension();
        $req->file('upload2')->storeAs('public/postvehicle',$imagename2);
    }
    if($req->hasFile('upload3')) {
        $req->validate([
            'upload3' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $imagename3 = Str::random(10) . time()."changed.". $req->file('upload3')->getClientOriginalExtension();
        $req->file('upload3')->storeAs('public/postvehicle',$imagename3);
    }
    if($req->hasFile('upload4')) {
        $req->validate([
            'upload4' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $imagename4 = Str::random(10) . time()."changed.". $req->file('upload4')->getClientOriginalExtension();
        $req->file('upload4')->storeAs('public/postvehicle',$imagename4);
    }  
       
       //Update all the other filled
       $reqData = $req->all();

       
       $reqData['airconditioner'] = $checkbox1Value;
       $reqData['powerdoor'] = $checkbox2Value;
       $reqData['antibraking'] = $checkbox3Value;
       $reqData['brakeassist'] = $checkbox4Value;
       $reqData['powersteering'] = $checkbox5Value;
       $reqData['driverairbag'] = $checkbox6Value;
       $reqData['passengerairbag'] = $checkbox7Value;
       $reqData['powerwindow'] = $checkbox8Value;
       $reqData['cdplayer'] = $checkbox9Value;
       $reqData['centrallocking'] = $checkbox10Value;
       $reqData['crashsensor'] = $checkbox11Value;

       $reqData['vimage1'] = $imagename1;
       $reqData['vimage2'] = $imagename2;
       $reqData['vimage3'] = $imagename3;
       $reqData['vimage4'] = $imagename4;

       $vehicle->update($reqData);
       return redirect()->back()->with('status','Updated Successfully');
    }

   function newbooking(){
        $fetchbooking=tblbooking::where('status', 0)->get();
        return view('admin.newbooking',['booking'=>$fetchbooking]);
    }

    function approved($id){
       $find= tblbooking::findOrFail($id);   
       $find->status = 1; // Set status to 1 for Approve
       $find->payment_status = "Approved";
       $find->save();
       return redirect()->route('newbooking');
    }
    function rejected($id){
        $find= tblbooking::findOrFail($id);   
        $find->status = -1; // Set status to -1 for Rejected
        $find->payment_status = "Rejected";
        $find->save();
        return redirect()->route('newbooking');
     }
    function confirmbooking(){
        $fetchbooking=tblbooking::where('status', 1)->orderBy('id','DESC')->get(); 
        return view('admin.confirmbooking',['booking'=>$fetchbooking]);
    }
    function deletebooking(){
        $fetchbooking=tblbooking::where('status', -1)->orderBy('id','DESC')->get(); 
        return view('admin.deletebooking',['booking'=>$fetchbooking]);
    }
    function confirmbookingprint($id){
        $find= tblbooking::findOrFail($id);
        return view('admin.confirmbookingprint',['data'=>$find]);
    }
    function contact(){
        $a = tblcontact::orderBy('id', 'desc')->get();   //all();
        return view('admin.contact',['rec'=>$a]);
    }

    function subscriber(){
        $sub = tblsubscriber::orderBy('id', 'desc')->get();
        return view('admin.subscriber',['data'=>$sub]);
    }
    function subscriberdelete($id){
    $sub = tblsubscriber::find($id);
    $sub->delete();
    return redirect()->back()->with('status','Subscriber Deleted Successfully');
    }

   
   
}


