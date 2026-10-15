<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    //protected $table = 'tb_storages';

    protected $fillable = [
        'name',
        'description',
        'total_capacity',
        'status',
        'province_id',
        'address',
    ];

    public function getFormattedIdAttribute() {
        return 'MFA' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function province() {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
