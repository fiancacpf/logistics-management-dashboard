<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOutput extends Model
{
    use HasFactory;

    protected $fillable = [
        'output_date',
        'output_type',
        'warehouse_id',
        'campaign_id',
        'beneficiary_id',
        'notes',
        'document_path',
        'user_id',
        'status',
    ];

    protected $dates = ['output_date'];

    // Relacionamentos
    public function items()
    {
        return $this->hasMany(StockOutputItem::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stageHistories()
    {
        return $this->hasMany(StageHistory::class, 'reference', 'id')
            ->where('type', 'stock_output');
    }


    public function getOutputTypeLabelAttribute()
    {
        return match ($this->output_type) {
            'distribution' => 'Distribuição a beneficiários',
            'institution_donation' => 'Doações a instituições',
            'internal_transfer' => 'Transferência interna',
            'campaign' => 'Campanha',
            default => $this->output_type,
        };
    }
}
