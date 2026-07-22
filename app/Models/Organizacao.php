<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacao extends Model
{
    use HasFactory;

    protected $table = 'organizacoes';

    protected $fillable = [
        'nome'
    ];

    public function colaboradores()
{
    return $this->hasMany(Colaborador::class);
}
}

