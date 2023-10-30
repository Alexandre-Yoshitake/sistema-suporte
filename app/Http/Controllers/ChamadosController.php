<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use Illuminate\Http\Request;

class ChamadosController extends Controller
{
    public function index()
    {
        $chamados = Chamado::all();

        return view('chamados.index')->with('chamados', $chamados);
    }

    public function create()
    {
        return view('chamados.create');
    }

    public function store(Request $request)
    {
        Chamado::create($request->all());
        return redirect('chamados');
    }

    public function show($id)
    {
        $chamado = Chamado::where('id', $id)->first();
        return view('chamados.show')->with('chamado', $chamado);
    }

    public function edit($id)
    {
        $chamado = Chamado::where('id', $id)->first();
        return view('chamados.edit')->with('chamado', $chamado);
    }

    public function update(Request $request)
    {
        Chamado::findOrFail($request->id)->update($request->all());

        return redirect('chamados');
    }

    public function destroy($id)
    {
        $chamado = Chamado::findOrFail($id)->delete();

        return redirect('chamados')->with('chamado', $chamado);
    }
}
