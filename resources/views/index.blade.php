@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    @if(session("msgDeleteSuccess"))
        <div class="col-12 col-md-6">
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                {{session("msgDeleteSuccess")}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

    @endif
    
    <div class="col-12 col-xl-8">
        <h4 class="fw-bold mb-4">Funcionários</h4>
        @if(count($funcionarios) > 0)
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Setor</th>
                                <th scope="col">Criado</th>
                                <th scope="col">Atualizado</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($funcionarios as $funcionario)
                                <tr>
                                    <th scope="row">{{$funcionario->id}}</th>
                                    <td>{{$funcionario->nome}}</td>
                                    <td>{{$funcionario->cpf}}</td>
                                    <td>{{$funcionario->setor->nome}}</td>
                                    <td>{{$funcionario->created_at}}</td>
                                    <td>
                                        @if(strtotime($funcionario->created_at) != strtotime($funcionario->updated_at))
                                            
                                            {{$funcionario->updated_at}}
                                        @else
                                            <span class="text-secondary">{{"Não foi Atualizado"}}</span>
                                        @endif
                                    
                                    </td>
                                    <td>
                                        <a href="{{route("funcionario.edit", ["funcionario" => $funcionario->id])}}" class="btn btn-sm btn-primary m-1"><i class="bi bi-pencil-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-outline-danger m-1 " data-bs-toggle="modal" data-bs-target="#modalDelete{{$funcionario->id}}"> <i class="bi bi-trash"></i></button>

                                        
                                        <div class="modal fade" id="modalDelete{{$funcionario->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Excluir Funcionário</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Você deseja realmente <span class="fw-bold">excluir</span> o(a) funcionario(a) <span class="fw-bold">{{$funcionario->nome}}</span> de CPF <span class="fw-bold">{{$funcionario->cpf}}</span> ?
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                <form id="form_{{$funcionario->id}}" method="post" action="{{ route('funcionario.destroy', ['funcionario' => $funcionario->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <!--<button type="submit">Excluir</button>-->
                                                    <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{$funcionario->id}}').submit()">Excluir</a>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                            
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center" role="alert">
                Sem funcionários cadastrados.
            </div>
        @endif
        
    </div>
</div>
@endsection