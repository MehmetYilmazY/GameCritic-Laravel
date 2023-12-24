<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameRating extends Model
{
    protected $fillable = ['user_id', 'game_id', 'rating'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
