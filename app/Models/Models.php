<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/*
AQUI TEMOS ALGUNS MODELS JÁ COM DEVIDO RELACIONAMENTO,
SÓ VAIS PRECISAR CERTIFICAR-SE DAS CHAVES ESTRANGEIRAS E DE ALGUNS ATTR.
*/

class Warehouse extends Model
{
    use HasUuids;
    protected $table = 'tb_storages';
    protected $fillable = ['nome', 'localizacao', 'responsavel'];

    public function entradas(): HasMany
    {
        return $this->hasMany(InputProduct::class, 'storage_id');
    }

    public function saidas(): HasMany
    {
        return $this->hasMany(OutputProduct::class, 'storage_id');
    }
}

class Lote extends Model
{
    use HasUuids;
    protected $table = 'tb_lotes';
    protected $fillable = [
        'product_id', 'codigo_lote', 'data_entrada', 'data_validade',
        'tipo', 'estado_id', 'qtd', 'observacoes'
    ];

    public function detalhesEntrada(): HasMany
    {
        return $this->hasMany(InputProductDetail::class, 'lote_id');
    }

    public function detalhesSaida(): HasMany
    {
        return $this->hasMany(OutputProductDetail::class, 'lote_id');
    }
}

class InputProduct extends Model
{
    use HasUuids;
    protected $table = 'tb_input_product_tables';
    protected $fillable = [
        'invoice_no', 'storage_id', 'supplier_id', 'expiration_date', 'entry_date',
        'input_type', 'docs_status_id', 'responsible', 'validator_signature',
        'authorizer_signature', 'finisher_signature', 'rejecter_signature', 'url_docs'
    ];

    public function detalhes(): HasMany
    {
        return $this->hasMany(InputProductDetail::class, 'input_id');
    }

    public function armazem(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'storage_id');
    }
}

class InputProductDetail extends Model
{
    use HasUuids;
    protected $table = 'tb_input_product_details';
    protected $fillable = ['input_id', 'lote_id', 'qtd', 'preco_unitario'];

    public function entrada(): BelongsTo
    {
        return $this->belongsTo(InputProduct::class, 'input_id');
    }

    public function lote(): BelongsTo
    {
        return $this->belongsTo(Lote::class, 'lote_id');
    }
}

class OutputProduct extends Model
{
    use HasUuids;
    protected $table = 'tb_output_product_tables';
    protected $fillable = [
        'note_invoice_no', 'invoice_no', 'beneficiary_id', 'storage_id', 'country',
        'province', 'destination', 'expiration_date', 'departure_date', 'output_type',
        'docs_status_id', 'campaign_id', 'responsible', 'validator_signature',
        'authorizer_signature', 'finisher_signature', 'rejecter_signature', 'url_docs'
    ];

    public function detalhes(): HasMany
    {
        return $this->hasMany(OutputProductDetail::class, 'output_id');
    }

    public function armazem(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'storage_id');
    }
}

class OutputProductDetail extends Model
{
    use HasUuids;
    protected $table = 'tb_output_product_details';
    protected $fillable = ['output_id', 'lote_id', 'qtd'];

    public function saida(): BelongsTo
    {
        return $this->belongsTo(OutputProduct::class, 'output_id');
    }

    public function lote(): BelongsTo
    {
        return $this->belongsTo(Lote::class, 'lote_id');
    }
}
