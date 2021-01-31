<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;
    protected $fillable = ["mobileId", "mobile_model", "mobile_country", "mobile_price"];
}
