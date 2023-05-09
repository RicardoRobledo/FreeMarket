<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\Us;

class Shopping extends Model
{
    use HasFactory;

    public function us()
    {
        return $this->belongsTo(Us::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
