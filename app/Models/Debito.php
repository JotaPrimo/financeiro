<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debito extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'user_id', 'ano_id', 'mes_id'];
}
