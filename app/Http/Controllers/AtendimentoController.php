<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Http\Requests\AtendimentoRequest;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Atendimento $atendimento)
    {
        $this->atendimento = $atendimento;
    }

    public function index()
    {
        $atendimentos = $this->atendimento::all();
        return view('atendimentos.index', compact('atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = \App\Models\Paciente::all(['id', 'name']);
        $medicos = \App\Models\Medico::all(['id', 'name']);
        return view('atendimentos.create', compact('pacientes', 'medicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtendimentoRequest $request)
    {
        $data = $request->all();
        // dd($data);
        Atendimento::create($data);
        flash('Atendimento cadastrado com sucesso')->success();
        return redirect()->route('atendimentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atendimento = $this->atendimento->findOrFail($id);
        return view('atendimentos.show', compact('atendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atendimento = $this->atendimento->findOrFail($id);
        // dd($atendimento);
        $pacientes = \App\Models\Paciente::all(['id', 'name']);
        $medicos = \App\Models\Medico::all(['id', 'name']);
        return view('atendimentos.edit', compact('atendimento', 'pacientes', 'medicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function update(AtendimentoRequest $request, $id)
    {
        $data = $request->all();
        
        $atendimento = Atendimento::findOrFail($id);
        $atendimento->update($data);
        flash('Atendimento alterado com sucesso')->success();
        return redirect()->route('atendimentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        $atendimento->delete();
        flash('Atendimento removido com sucesso')->success();
        return redirect()->route('atendimentos.index');
    }
}
