<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\modelAgendamento;

class modelMedico extends Model
{
    protected $table = 'medicos';
    protected $fillable=['nome'];

    public function relAgendamento(){
        return $this->hasMany(modelAgendamento::class);
    }
}
