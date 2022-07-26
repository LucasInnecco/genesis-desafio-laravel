<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelRecepcionista;

class recepcionistaController extends Controller
{

    private $objRecepcionista;

    public function __construct(){
        $this->objRecepcionista=new modelRecepcionista();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recepcionistas=$this->objRecepcionista->all();
        return view('recepcionista.home', compact('recepcionistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recepcionista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create recepcionista
        $this->objRecepcionista->create([
            'nome'=>$request->recepcionistaNome,
        ]);

        return redirect('/recepcionista');
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
        $recepcionista=$this->objRecepcionista->find($id);
        return view('recepcionista.create', compact('recepcionista'));
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
        $this->objRecepcionista->where(['id'=>$id])->update([
            'nome'=>$request->recepcionistaNome,
        ]);        
        
        return redirect('/recepcionista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recepcionista=modelRecepcionista::find($id);
        $recepcionista->delete();
        return redirect('/recepcionista');
    }
}
