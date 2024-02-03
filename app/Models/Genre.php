<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    use HasFactory;

    protected $primaryKey = 'genre_id';

    public function film(): BelongsTo

    {
        return $this->belongsTo(Film::class);
    }

    protected $fillable = [
        'genre_name',

    ];
}
