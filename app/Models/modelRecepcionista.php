<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\modelAgendamento;

class modelRecepcionista extends Model
{
    protected $table = 'recepcionistas';
    protected $fillable=['nome'];

    public function relAgendamento(){
        return $this->hasMany(modelAgendamento::class);
    }
}
