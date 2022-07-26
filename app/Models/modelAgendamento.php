<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\modelPessoa;
use App\Models\modelMedico;
use App\Models\modelRecepcionista;

class modelAgendamento extends Model
{
    protected $table = 'agendamentos';
    protected $fillable=['pessoa_id', 'motivo', 'urgencia', 'dataAtendimento', 'medico_id', 'recepcionista_id'];
    

    public function relPessoa(){
        return $this->hasOne(modelPessoa::class, 'id', 'pessoa_id');
    }
    public function relMedico(){
        return $this->hasOne(modelMedico::class, 'id', 'medico_id');
    }
    public function relRecepcionista(){
        return $this->hasOne(modelRecepcionista::class, 'id', 'recepcionista_id');
    }
    
}
