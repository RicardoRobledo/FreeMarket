<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Us;

class Product extends Model
{
    use HasFactory;

    public function us(): BelongsToMany
    {
        return $this->belongsToMany(Us::class);
    }
}
