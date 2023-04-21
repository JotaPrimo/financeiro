<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Debito extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'user_id', 'ano', 'mes_id', 'categoria_debito_id'];

    public function getNomeAttribute($value)
    {
        return strtoupper($value);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mes(): BelongsTo
    {
        return $this->belongsTo(Mes::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(CategoriaDebito::class, 'categoria_debito_id');
    }

    public function formatarParaDinheiro()
    {
        return "R$ " . number_format($this->valor, 2, ',', '.');
    }

    public function format()
    {
        return number_format($this->valor, 2, ',', '.');
    }

}
