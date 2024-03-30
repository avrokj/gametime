<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Arena extends Model
{
    use HasFactory;

    protected $fillable = ['coach_name', 'image', 'country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
