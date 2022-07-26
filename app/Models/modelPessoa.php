<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\modelAgendamento;

class modelPessoa extends Model
{
    protected $table = 'pessoas';
    protected $fillable=['nome', 'cpf', 'cartaoSus'];

    public function relAgendamento(){
        return $this->hasMany(modelAgendamento::class);
    }
}
