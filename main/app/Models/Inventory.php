<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inventory extends Model
{
    protected $table = 'inventory';
    protected $fillable = ['product_code','product_name','category','quantity','brand','size'];
    use HasFactory; 

    public function products(): HasOne
    {
        return $this->HasOne(Products::class);
    }

}
