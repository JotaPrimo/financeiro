<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaDebito extends Model
{
    use HasFactory;

    const DELETADO = 1;
    const NAO_DELETADO = 1;

    const COMIDA = 1;
    const        UBER = 2;
    const   LAZER = 3;
    const   EDUCACAO = 4;
    const   CONTAS_DE_CASA = 5;

    protected $fillable = ['nome'];


    public function debitos(): HasMany
    {
        return $this->hasMany(Debito::class);
    }
}
