<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;

    protected $primaryKey = 'film_id';

    public function genres(): HasMany
    {
        return $this->hasMany(Genre::class);
    }


    protected $fillable = [
        'film_name',
        'film_description',
    ];
}
