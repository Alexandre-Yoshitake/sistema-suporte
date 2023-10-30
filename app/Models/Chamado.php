<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    use HasFactory;

    protected $table = 'tb_chamados';

    protected $fillable = [
        'id',
        'created_at',
        'titulo',
        'descricao',
        'status',
    ];
}
