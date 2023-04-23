<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Provento extends Model
{
    use HasFactory;

    const DELETADO = 1;
    const NAO_DELETADO = 1;

    protected $fillable = ['nome', 'valor', 'ano', 'user_id', 'mes_id', 'categoria_provento_id'];

    public function mes(): BelongsTo
    {
        return $this->belongsTo(Mes::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(CategoriaProvento::class, 'categoria_provento_id');
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
