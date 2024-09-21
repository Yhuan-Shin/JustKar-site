<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [
        'ref_no',
        'product_code',
        'product_name',
        'size',
        'brand',
        'category',
        'quantity',
        'price',
        'total_price',
        'cashier_name',
    ];
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'product_code', 'product_code');
    }
    //update inventory quantity

}
