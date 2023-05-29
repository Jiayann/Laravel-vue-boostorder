<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(related:User::class);

    }

    public function products()
    {
        return $this->belongsToMany(related:Product::class)
            ->withPivot('quantity');
    }
}
