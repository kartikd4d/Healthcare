<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suitablility extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "question1",
        "question2",
        "question3",
        "question4",
        "question5",
        "question6",
        "question7",
        "question8",
    ];
}
