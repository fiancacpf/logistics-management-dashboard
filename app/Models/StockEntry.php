<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_id',
        'supplier_id',
        'entry_type',
        'document_path',
        'notes',
        'entry_date',
        'user_id',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function items()
    {
        return $this->hasMany(StockEntryItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stageHistories()
    {
        return $this->hasMany(StageHistory::class, 'reference', 'id')
            ->where('type', 'stock_entry');
    }

    public function getEntryTypeLabelAttribute()
    {
        return match ($this->entry_type) {
            'buy' => 'Compra Pública',
            'donation' => 'Doação Externa',
            'transfer' => 'Transferência de Armazéns',
            'other' => 'Terceiros',
            default => $this->entry_type,
        };
    }

}
