<?php
// app/Models/LikedShow.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedShow extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'show_id', 'show_name', 'show_image', 'show_premiered', 'show_url'];
    public $timestamps = false;
}
