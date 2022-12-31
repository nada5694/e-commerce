<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations;

class Cart extends Model
{
    use HasApiTokens , HasFactory , SoftDeletes;

    public $table = 'cart';

    protected $fillable = [
        'customer_username' ,
        'customer_phone' ,
        'customer_email' ,
        'customer_address' ,
        'product_name' ,
        'product_image' ,
        'is_accessory' ,
        'clothing_type' ,
        'product_category' ,
        'price' ,
        'discount' ,
        'quantity' ,
        'product_id' ,
        'customer_id' ,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(products::class);
    }

    public function create_user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function update_user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
