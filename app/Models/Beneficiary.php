<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $table = 'beneficiary';

    protected $fillable = [
        'name',
        'photo',
        'nif',
        'telephone',
        'email',
        'id_province',
        'address',
        'gender',
        'type',
        'dob'
    ];

    //public $timestamps = false;

    public function getFormattedIdAttribute() {
        return 'MFB' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function province() {
        return $this->belongsTo(Province::class, 'id_province');
    }

}
