<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameLog extends Model
{
    use HasFactory;
    protected $guarded = []; // tühi jada, ehk siis saame kõike muuta

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
