<?php

namespace App\Models;

use App\Models\Provento;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mes extends Model
{
    use HasFactory;

    const JANEIRO = 1;
    const FEVEREIRO = 2;
    const MARCO = 3;
    const ABRIL = 4;
    const MAIO = 5;
    const JUNHO = 6;
    const JULHO = 7;
    const AGOSTO = 8;
    const SETEMBRO = 9;
    const OUTUBRO = 10;
    const NOVEMBRO = 11;
    const DEZEMBRO = 12;

    protected $fillable = [
        'nome',
    ];

    public function debitos(): HasMany
    {
        return $this->hasMany(Debito::class);
    }

    public function proventos(): HasMany
    {
        return $this->hasMany(Provento::class);
    }

}
