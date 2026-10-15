<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'objective',
        'beneficiary_type',
        'estimated_beneficiaries',
        'start_date',
        'end_date',
        'document_path',
        'user_id',
    ];

    public function getFormattedIdAttribute() {
        return 'MCP' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function items()
    {
        return $this->hasMany(CampaignProduct::class);
    }
}
