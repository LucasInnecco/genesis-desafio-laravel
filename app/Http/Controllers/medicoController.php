<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMedico;


class medicoController extends Controller
{

    private $objMedico;

    public function __construct(){
        $this->objMedico=new modelMedico();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos=$this->objMedico->all();
        return view('medico.home', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create medico
        $this->objMedico->create([
            'nome'=>$request->medicoNome,
        ]);

        return redirect('/medico');
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
        $medico=$this->objMedico->find($id);
        return view('medico.create', compact('medico'));
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
        $this->objMedico->where(['id'=>$id])->update([
            'nome'=>$request->medicoNome,
        ]);        
        
        return redirect('/medico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico=modelMedico::find($id);
        $medico->delete();
        return redirect('/medico');
    }
}
