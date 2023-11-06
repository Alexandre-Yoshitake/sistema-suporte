@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-4">Chamados</h1>
        <a class="btn btn-success" href="/chamados/create">Novo chamado</a>
    </div>
    @foreach ($chamados as $chamado)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <p><b>{{ $chamado->titulo }}</b></p>
                <p><b>Status:</b> {{ $chamado->status }}</p>
                <p><b>Status:</b> {{ $chamado->created_at->format('d/m/Y') }}</p>
                <div class="d-flex">
                    <a class="btn btn-info m-1" href="/chamados/{{ $chamado->id }}">Visualizar</a>
                    <a class="btn btn-warning m-1" href="/chamados/edit/{{ $chamado->id }}">Editar</a>
                    <form action="/chamados/{{ $chamado->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger m-1">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">Descrição: {{ $chamado->descricao }}</p>
            </div>
        </div>
    @endforeach
@endsection
