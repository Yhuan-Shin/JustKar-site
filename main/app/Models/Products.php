<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'product_code',
        'product_name',
        'category',
        'brand',
        'size',
        'inventory_id',
        'product_image',
        'price',
    ];
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class,'inventory_id','id');
    }

}
