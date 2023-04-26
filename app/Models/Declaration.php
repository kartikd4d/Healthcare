<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "user_name",
        "user_password",
        "id_verification1",
        "id_verification2",
        "id_verification3",
        "legal_name",
        "signature",
        "date",
    ];
}