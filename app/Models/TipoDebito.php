<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDebito extends Model
{
    use HasFactory;

    const DELETADO = 1;
    const NAO_DELETADO = 1;

    protected $fillable = ['nome'];
}
