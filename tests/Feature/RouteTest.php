<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{   
    
    public function test_home_route()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_about_route()
    {
        $response = $this->get(route('about'));     //$response = $this->get('/about');
        $response->assertStatus(200);
    }
   public function test_faq_route()
    {
        $response = $this->get(route('faq'));
        $response->assertStatus(200);
    }
    public function test_booking_receipt_route()
    {
        $response = $this->get(route('bookingreceipt'));
        $response->assertStatus(200);
    }
    
 
    


                

}
