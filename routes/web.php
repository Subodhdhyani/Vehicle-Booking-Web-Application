<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\StripeController;


// Fallback route to handle all unmatched routes
Route::fallback(function () {
    return view('errors.404');
});

//All user controller Public Route
Route::get('/',[usercontroller::class,'home'])->name('home');
Route::get('/about',[usercontroller::class,'about'])->name('about');
Route::get('/contact',[usercontroller::class,'contact'])->name('contactus');
Route::post('/contact',[usercontroller::class,'contactreq'])->name('contactreq');
Route::get('/faq',[usercontroller::class,'faq'])->name('faq');
//Used Jquery Plugin Inside it to display vehicle details pass by home screen
Route::get('/vehicledetail{id?}',[usercontroller::class,'vehicledetail'])->name('vehicledetail');
//footer post route common for all due to ajax
Route::post('/form-submit', [usercontroller::class, 'submit']);
//Booking Receipt
Route::get('/bookingreceipt',[usercontroller::class,'bookingreceipt'])->name('bookingreceipt');
Route::post('/bookingreceiptreq',[usercontroller::class,'bookingreceiptreq'])->name('bookingreceiptrreq');
//Live Payment With Stripe
Route::post('/stripe', [StripeController::class, 'stripe'])->name('stripe');
Route::get('/success', [StripeController::class, 'success'])->name('success');
//Route::get('cancel', [StripeController::class, 'cancel'])->name('cancel');
Route::get('/refund/{payment_intent?}/{amount?}',[StripeController::class,'refund'])->name('refund');

//Vehicle booking without payment
//Route::post('/vehicledetail',[usercontroller::class,'vehicle_booking'])->name('vehicle_booking');
//display booking 
//Route::get('/vehicle_booking_view/{id?}',[usercontroller::class,'vehicle_booking_view'])->name('vehicle_booking_view');


//All Admin Route
Route::group(['prefix'=>'/admin'],function(){
    //Hide Signup route after one time signup successfully for auth role
    Route::get('/signup',[admincontroller::class,'signup'])->name('signup');
    Route::post('/signup',[admincontroller::class,'signupreq'])->name('signupreq');
    
    Route::get('/signin',[admincontroller::class,'signin'])->name('signin');
    Route::post('/signin',[admincontroller::class,'signinreq'])->name('signinreq');
    Route::get('/signout',[admincontroller::class,'signout'])->name('signout');
    
    //Secure Route By Middleware only Access when Login
    Route::middleware('adminloginauth')->group(function () {
    //custom route for display alert box type message just like sweetalert    
    Route::get('/successmessage',[admincontroller::class,'successmessage'])->name('successmessage');

    Route::get('/dashboard',[admincontroller::class,'dashboard'])->name('dashboard');

    Route::get('/createbrands',[admincontroller::class,'createbrands'])->name('createbrands');
    Route::post('/createbrands',[admincontroller::class,'createbrandsreq'])->name('createbrandsreq');
    Route::get('/managebrands',[admincontroller::class,'managebrands'])->name('managebrands');
    Route::get('/managebrandsdelete/{id?}',[admincontroller::class,'managebrandsdelete'])->name('managebrandsdelete');
    Route::get('/managebrandsupdate/{id?}',[admincontroller::class,'managebrandsupdate'])->name('managebrandsupdate');
    Route::post('/managebrandsupdate/{id?}',[admincontroller::class,'managebrandsupdatereq'])->name('managebrandsupdatereq');
    
    Route::get('/postvehicle',[admincontroller::class,'postvehicle'])->name('postvehicle');
    Route::post('/postvehicle',[admincontroller::class,'postvehiclereq'])->name('postvehiclereq');
    Route::get('/managevehicle',[admincontroller::class,'managevehicle'])->name('managevehicle');
    Route::get('/postvehicledelete/{id?}',[admincontroller::class,'postvehicledelete'])->name('postvehicledelete');
    Route::get('/postvehicleupdate/{id?}',[admincontroller::class,'postvehicleupdate'])->name('postvehicleupdate');
    Route::post('/postvehicleupdatereq/{id?}',[admincontroller::class,'postvehicleupdatereq'])->name('postvehicleupdatereq');


    Route::get('/newbooking',[admincontroller::class,'newbooking'])->name('newbooking');
    Route::get('/approved/{id?}',[admincontroller::class,'approved'])->name('approved');
    Route::get('/rejected/{id?}',[admincontroller::class,'rejected'])->name('rejected');
    Route::get('/confirmbooking',[admincontroller::class,'confirmbooking'])->name('confirmbooking');
    Route::get('/confirmbookingprint/{id?}',[admincontroller::class,'confirmbookingprint'])->name('confirmbookingprint');
    Route::get('/deletebooking',[admincontroller::class,'deletebooking'])->name('deletebooking');


    Route::get('/contact',[admincontroller::class,'contact'])->name('contact');

    Route::get('/subscriber',[admincontroller::class,'subscriber'])->name('subscriber');
    Route::get('/subscriberdelete/{id?}',[admincontroller::class,'subscriberdelete'])->name('subscriberdelete');


    });
        

});


