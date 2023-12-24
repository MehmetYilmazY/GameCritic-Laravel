<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'studio', 'platform', 'genre', 'releasedate', 'image_url', 'short_description'];

}
