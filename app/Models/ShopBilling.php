<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopBilling extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function shop() : BelongsTo{
       return $this->belongsTo(Shop::class); 
    }
}
