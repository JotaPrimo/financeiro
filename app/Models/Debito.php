<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Debito extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'user_id', 'ano_id', 'mes_id', 'categoria_debito_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(CategoriaDebito::class, 'categoria_debito_id');
    }

    public function formatarParaDinheiro()
    {
        return "R$ " . number_format($this->valor, 2, ',', '.');
    }

}
