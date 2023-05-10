<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businesinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
          "business_name",
          "business_type",
          "business_address",
          "business_email",
          "business_phone_no",
          "states_operating_in",
          "abn_name",
          "registered_abn_name",
          "trading_name" 
    ];
}
