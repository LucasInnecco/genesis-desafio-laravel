<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelAgendamento;
use App\Models\modelPessoa;
use App\Models\modelMedico;
use App\Models\modelRecepcionista;

class homeController extends Controller
{

    private $objAgendamento;
    private $objPessoa;

    public function __construct(){
        $this->objAgendamento=new modelAgendamento();
        $this->objPessoa=new modelPessoa();
        $this->objMedico=new modelMedico();
        $this->objRecepcionista=new modelRecepcionista();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamentos=$this->objAgendamento->all();
        return view('agendamentos.home', compact('agendamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medico=$this->objMedico->all();
        $recepcionista=$this->objRecepcionista->all();
        return view('agendamentos.create', compact('medico', 'recepcionista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valida se já existe uma data de atendimento que foi informada
        $request->validate([
            'dataAtendimento'=> ['required', 'unique:agendamentos,dataAtendimento']
        ]);
        //create paciente
        $pegaPessoa = $this->objPessoa->create([
            'nome'=>$request->pacienteNome,
            'cpf'=>$request->cpf,
            'cartaoSus'=>$request->cartaoSus
        ]);
        //create agendamento
        $this->objAgendamento->create([
            'motivo'=>$request->motivo,
            'urgencia'=>$request->urgencia,
            'medico_id'=>$request->medicoNome,
            'recepcionista_id'=>$request->recepcionistaNome,
            'pessoa_id'=>$pegaPessoa->id,
            'dataAtendimento'=>$request->dataAtendimento

        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agendamento=$this->objAgendamento->find($id);
        $medico=$this->objMedico->all();
        $recepcionista=$this->objRecepcionista->all();
        $pessoa=$this->objPessoa->all();
        return view('agendamentos.create', compact('agendamento', 'pessoa', 'medico', 'recepcionista'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $agendamento=$this->objAgendamento->find($id);
        //valida se já existe uma data de atendimento que foi informada
        $request->validate([
            'dataAtendimento'=> ['required', 'unique:agendamentos,dataAtendimento']
        ]);
        
        $pegaPessoa = $this->objPessoa->where(['id'=>$agendamento->pessoa_id])->update([
            'nome'=>$request->pacienteNome,
            'cpf'=>$request->cpf,
            'cartaoSus'=>$request->cartaoSus
        ]);
        $this->objAgendamento->where(['id'=>$id])->update([
            'motivo'=>$request->motivo,
            'urgencia'=>$request->urgencia,
            'dataAtendimento'=>$request->dataAtendimento,
            'medico_id'=>$request->medicoNome,  //altera o id do medico na tabela agendamento para puxar o médico do novo id
            'recepcionista_id'=>$request->recepcionistaNome, //mesma coisa do medico, porém com recepcionista
        ]);        
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agendamento=modelAgendamento::find($id);
        $agendamento->delete();
        return redirect('/');
    }
}
