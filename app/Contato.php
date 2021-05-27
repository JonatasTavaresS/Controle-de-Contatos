<?php

namespace App;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public $timestamps = false;
    protected $fillable = [ 'nome', 'telefone', 'CPF', 'RG'];

    public function enderecos(){
        return $this->hasMany(Endereco::class);
    }
}
