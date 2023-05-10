<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "title",
        "video_link",
        "view_video",
        "file_path",
        "file_name",
        "file_size",
        "status"
      
    ];
}
