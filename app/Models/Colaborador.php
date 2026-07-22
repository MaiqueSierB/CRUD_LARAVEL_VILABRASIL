<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradores';

    protected $fillable = [
        'nome',
        'cargo',
        'tipo',
        'organizacao_id'
    ];
    public function organizacao()
{
    return $this->belongsTo(Organizacao::class);
}
}
