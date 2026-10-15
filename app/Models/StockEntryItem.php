<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_entry_id',
        'product_id',
        'quantity',
        'unit_id',
        'batch_number',
        'state_id',
        'expiration_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function state()
    {
        return $this->belongsTo(ProductState::class, 'state_id');
    }

}
