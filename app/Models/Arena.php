<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Arena extends Model
{
    use HasFactory;

    protected $fillable = ['arena_name', 'country_id', 'address',];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
