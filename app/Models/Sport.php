<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = []; // tühi jada, ehk siis saame kõike muuta

    public function books(): BelongsToMany
    {
        // return $this->belongsToMany(Book::class, 'book_authors');
    }
}
