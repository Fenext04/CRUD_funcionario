<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\Setor;
class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Funcionario $funcionario)
    {
         $this->funcionario = $funcionario;
    }
    public function index()
    {
        $funcionarios = Funcionario::all();

        return view("index",compact("funcionarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $setores = Setor::all();

        
        return view('create-funcionario',compact("setores"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $request->validate($this->funcionario->rules(),$this->funcionario->feedback());

        $funcionario = Funcionario::create($request->all());

        if ($funcionario){
            return back()->with("msgSuccess", "Funcionário cadastrado com sucesso");
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario){

        $setores = Setor::all();

        return view("edit-funcionario", compact("funcionario","setores"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $this->funcionario = $funcionario;
        $request->validate($this->funcionario->rules(),$this->funcionario->feedback());
        $funcionario->update($request->all());
        if ($funcionario){
            return back()->with("msgSuccess", "Funcionário atualizado com sucesso,");
        }
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return back()->with("msgDeleteSuccess", "Funcionário deletado com sucesso!");
    }
}
