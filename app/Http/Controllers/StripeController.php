<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\tblbooking;
use Stripe\Stripe;
use Stripe\Refund;
class StripeController extends Controller
{
    public function stripe(Request $request)
    {
       /*$vehicle_name = $request->vehicle_name;
       $vehicle_id = $request->vehicle_id;
       $user_name  = $request->name; //also apply validation here   $validatedData = $request->validate(['email=>'required']); and in down $validatedData['email']
       $user_email = $request->email;
       $mobile = $request->number;
       $message = $request->comment;
       $date = $request->date;
       $time = $request->time;*/

// Validate the incoming request data
$validatedData = $request->validate([
    'vehicle_name' => 'required',
    'vehicle_id' => 'required',
    'name' => 'required',
    'email' => 'required|email',
    'number' => 'required|numeric|digits:10',
    'comment' => 'nullable|string',
    'date' => 'required|date',
    'time' => 'required|date_format:H:i',
]);

// Retrieve validated data
  $vehicle_name = $validatedData['vehicle_name'];
  $vehicle_id = $validatedData['vehicle_id'];
  $user_name = $validatedData['name'];
  $user_email = $validatedData['email'];
  $mobile = $validatedData['number'];
  $message = $validatedData['comment'];
  $date = $validatedData['date'];
  $time = $validatedData['time'];

      // $logoUrl=asset('Business_Logo/Main_logo.png');//in test pass online url of image
        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));//or ...StripeClient('sk_test12222.....');
        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                            'name' => $vehicle_name,//$request->vehicle_name
                            'images' => ['https://picsum.photos/200'],
                        ],
                        'unit_amount' => $request->button_name*100,
                    ],
                    'quantity' => $request->quantity,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success').'?session_id={CHECKOUT_SESSION_ID}',
            //'cancel_url' => route('cancel'),
            'metadata' => [
                'user_name'=>$user_name,//also directly used $request->name
                'user_email'=>$user_email,
                'vehicle_id'=>$vehicle_id,
                'mobile'=>$mobile,
                'date' => $date, 
                'time' => $time,
                'comment'=>$message,
                // Include other fields here
            ],
        ]);
        //dd($response);
        if(isset($response->id) && $response->id != ''){  //id receive from stripe response
            session()->put('product_name', $request->vehicle_name);
            session()->put('unit_amount', $request->button_name);
            session()->put('quantity', $request->quantity);
            return redirect($response->url);
        } else {
            //return redirect()->route('cancel');
            return redirect()->back()->with('cancel_status', 'Your payment was canceled.');
        }
    }

    
    public function success(Request $request)
    {
        if(isset($request->session_id)) {
            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            //dd($response);
           // Retrieve form input data from Stripe metadata
                 $metadata = $response->metadata;
            $payment = new tblbooking();
            $payment->payment_id = $response->id;
            $payment->payment_intent = $response->payment_intent;
            $payment->booking_id = 'BK' . mt_rand(10000, 99999);
            $payment->name = $response->customer_details->name; //this name from stripe payment form also pass the form name here
            $payment->email = $response->customer_details->email;
            $payment->vehicle_id= $metadata['vehicle_id'];
            $payment->vehicle_name = session()->get('product_name');
            $payment->mobile =$metadata['mobile'];
            $payment->message = $metadata['comment'];
            $payment->date = $metadata['date'];
            $payment->time = $metadata['time'];
            $payment->amount = session()->get('unit_amount');
            $payment->payment_status = $response->status;
            $payment->status = 0;
            $payment->payment_method = "Stripe Method";
            $payment->save();

        session()->forget('product_name');
        session()->forget('unit_amount');
        session()->forget('quantity');
        return redirect()->route('vehicledetail', ['id' =>  $payment->vehicle_id])->with('success_status','Your Booking id is: ' . $payment->booking_id);
    } 
        
    else {
        return redirect()->back()->with('cancel_status', 'Your payment was canceled.');
        // return redirect()->route('cancel');
        }
    }

    /*public function cancel()
    {
        return "Payment is canceled."; 
    }*/


function refund($payment_intent,$amount){
    //Stripe::setApiKey('sk_test_51OlAnEEE1FlnNu.................................');
    Stripe::setApiKey(config('stripe.stripe_sk'));  //inside config-stripe file
    //check already refund
    $existing_refunds = Refund::all(['payment_intent' => $payment_intent]);
    //dd ($existing_refunds);
   if ($existing_refunds->count ===1) {
    // Existing refunds found for the payment intent
    return redirect()->back()->with('already_refund','This refund is already executed');
   }

   // Create a refund for the specified Charge ID and refund amount
    $refund = Refund::create([
            'payment_intent' => $payment_intent,
            'amount' => $amount*100,
            'reason'=>'requested_by_customer'
    ]);
    //dd return $refund;
     //$refund receive from stripe when  any operatio      
    $status = $refund->status;//receive by stripe request see up dd
    $refund_id = $refund->id; //receive by stripe request see up dd
   if($status =='succeeded'){
            return redirect()->back()->with('success_status', 'Refund id :'.$refund_id);
    }else{
        return redirect()->back()->with('cancel_status', 'Refund Failed');
    }
}

   




}