<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblbrand extends Model
{
    use HasFactory;
    protected $table="tblbrands";
    protected $primarykey="id";
    protected $fillable=['brandname'];
}
