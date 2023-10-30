@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-4">Visualizar Chamado</h1>
        <a href="/chamados" class="btn btn-outline-success">Voltar</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="form-group col-md-6">
                <h4>Título</h4>
                <p class="m-3">{{ $chamado->titulo }}</p>
            </div>
            <div class="form-group col-md-6">
                <h4>Status</h4>
                <p class="m-3">{{ $chamado->status }}</p>
            </div>
        </div>
        <div class="form-group col-md-9">
            <h4>Descrição</h4>
            <p class="m-3">{{ $chamado->descricao }}</p>
        </div>
    </div>
@endsection
