<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblvehicle extends Model
{
    use HasFactory;
    protected $table="tblvehicles";
    protected $primarykey="id";
    protected $fillable = [
        'vehicletitle',
       'selectbrand' ,
       'textcomment',
       'pricezone' ,
       'fueltype' ,
       'yearofmfg',
       'seatcapacity',
       'vimage1',
       'vimage2',
       'vimage3',
       'vimage4',
       'airconditioner', 
       'powerdoor', 
       'antibraking', 
       'brakeassist', 
       'powersteering', 
       'driverairbag', 
       'passengerairbag',
       'powerwindow', 
       'cdplayer',
       'centrallocking',
       'crashsensor' 
      
    ];
}
