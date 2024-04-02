<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['position_name', 'sport_id'];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
