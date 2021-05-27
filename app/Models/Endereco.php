<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['rua', 'numero', 'complemento', 'bairro', 'CEP', 'cidade', 'estado'];
    public $timestamps = false;

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}