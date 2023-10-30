@extends('layouts.app')

@section('content')
    <form action="/chamados/update/{{ $chamado->id }}" method="post">
        @csrf
        @method('put')

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="m-4">Visualizar Chamado</h1>
            <a href="/chamados" class="btn btn-outline-success">Voltar</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="form-label" for="titulo"><b>Título</b></label>
                    <input class="form-control" type="text" id="titulo" name="titulo" value="{{ $chamado->titulo }}">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="status"><b>Status</b></label>
                    <select class="form-select" name="status" id="status">
                        <option value="{{ $chamado->status }}">{{ $chamado->status }}</option>
                        <option value="Em andamento">Em andamento</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-9">
                <label class="form-label" for="descricao"><b>Descrição</b></label>
                <textarea class="form-control" name="descricao" id="descricao" rows="10">{{ $chamado->descricao }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-4">
                Editar Chamado
            </button>
        </div>
    </form>
@endsection
