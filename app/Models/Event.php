<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function game()
    {
        return $this->hasMany(Game::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function arena()
    {
        return $this->belongsTo(Arena::class);
    }
}
