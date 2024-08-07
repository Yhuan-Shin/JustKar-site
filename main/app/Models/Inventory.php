<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'id';
    protected $fillable = ['product_code','product_name','category','quantity','brand','size', 'critical_level', 'status'];
    use HasFactory; 

    public function products(): HasOne
    {
        return $this->hasOne(Products::class, 'product_id', 'id');
    }
    protected static function booted()
    {
        static::updated(function ($inventory) {
            Products::where('inventory_id', $inventory->id)->update([
                'product_name' => $inventory->product_name,
                'category' => $inventory->category,
                'brand' => $inventory->brand,
                'size' => $inventory->size,
            ]);
         
        });
    }
    

}

