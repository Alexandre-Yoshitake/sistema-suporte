@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-4">Equipe</h1>
    </div>
    @foreach ($users as $user)
        @if ($user->permission == 'admin')
            <div class="card m-4">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-2"><b>{{ $user->name }}</b></h4>
                    <p class="card-text m-2"><b>Perfil:</b> {{ $user->permission }}</p>
                    @if ($user->status)
                        <p class="card-text text-success m-2"><b class="text-dark">Status:</b> ativo</p>
                    @else
                        <p class="card-text text-danger m-2"><b class="text-dark">Status:</b> inativo</p>
                    @endif
                    <div class="d-flex">
                        <a class="btn btn-warning m-1" href="/equipe/edit/{{ $user->id }}">Editar</a>
                        <form action="/equipe/{{ $user->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger m-1">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex gap-5">
                        <p class="card-text"><b>CPF:</b> {{ $user->cpf }}</p>
                        <p class="card-text"><b>Data de Nascimento:</b>
                            {{ date('d/m/Y', strtotime($user->data_nascimento)) }}
                        </p>
                    </div>
                    <div class="d-flex gap-5">
                        <p class="card-text"><b>Celular:</b> {{ $user->celular }}</p>
                        <p class="card-text"><b>E-mail:</b> {{ $user->email }}</p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
