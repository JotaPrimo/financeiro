<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaProvento extends Model
{
    use HasFactory;

    const DELETADO = 1;
    const NAO_DELETADO = 1;

    const SALARIO_MENSAL = 1;
    const ALUGUEL = 2;
    const FREELA = 3;
    const PIS = 4;
    const VALE_ALIMENTENCAO = 5;

    protected $fillable = ['nome'];

    public function proventos(): HasMany
    {
        return $this->hasMany(Provento::class);
    }
}
