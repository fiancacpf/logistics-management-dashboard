<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_id',
        'inventory_date',
        'notes',
        'status',
        'created_by',
        'reviewed_by',
        'reviewed_at',
    ];

    public function items() {
        return $this->hasMany(StockInventoryItem::class);
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reviewer() {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function stageHistories()
    {
        return $this->hasMany(StageHistory::class, 'reference', 'id')
            ->where('type', 'stock_inventory');
    }
}
