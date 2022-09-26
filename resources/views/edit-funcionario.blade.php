@extends("layouts.app")

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title mb-4">Editar funcionario {{$funcionario->nome}}</h5>
                    <form method="post" action="{{route("funcionario.update", ["funcionario" => $funcionario->id])}}">
                        @method("PUT")
                        @csrf()
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputNome" class="form-label">Nome</label>
                                    <input type="text" class="form-control @error("nome") is-invalid @enderror" name="nome" value="{{$funcionario->nome ?? old("nome")}}" id="inputNome" >
                                    <div class="invalid-feedback">
                                        {{$errors->first("nome")}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputCpf" class="form-label">CPF</label>
                                    <input type="text" class="form-control @error("cpf") is-invalid @enderror" name="cpf" value="{{$funcionario->cpf ?? old("cpf")}}" id="inputCpf">
                                    <div id="cpfHelp" class="form-text">Formato: XXX.XXX.XXX-XX</div>
                                    <div class="invalid-feedback">
                                        {{$errors->first("cpf")}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="inputSetores" class="form-label">Setores</label>
                                <select class="form-select @error("setor_id") is-invalid @enderror" name="setor_id"  aria-label="Default select example" id="inputSetores">
                                    <option selected disabled>Selecione:</option>
                                    @foreach($setores as $setor)
                                        <option value="{{$setor->id}}" {{($funcionario->setor_id ?? old("setor_id")) == $setor->id ? "selected" : ""}}>{{$setor->nome}}</option>
                                    
                                    @endforeach
                                  </select>
                                  <div class="invalid-feedback">
                                    {{$errors->first("setor_id")}}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputPIS" class="form-label">PIS</label>
                                    <input type="text" class="form-control @error("carteira_trabalho") is-invalid @enderror" name="carteira_trabalho" value="{{$funcionario->carteira_trabalho ?? old("carteira_trabalho")}}" id="inputPIS">
                                    <div id="pisHelp" class="form-text">Formato: XXX.XXXXX.XX-X</div>
                                    <div class="invalid-feedback">
                                        {{$errors->first("carteira_trabalho")}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputTelefone1" class="form-label">Telefone 1</label>
                                    <input type="text" class="form-control @error("telefone_1") is-invalid @enderror" name="telefone_1" value="{{$funcionario->telefone_1 ?? old("telefone_1")}}" id="inputTelefone1">
                                    <div id="telefoneHelp" class="form-text">Formato: (XX) XXXXX-XXXX</div>
                                    <div class="invalid-feedback">
                                        {{$errors->first("telefone_1")}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputTelefone2" class="form-label">Telefone 2</label>
                                    <input type="text" class="form-control @error("telefone_2") is-invalid @enderror" name="telefone_2" value="{{$funcionario->telefone_2 ?? old("telefone_2")}}" id="inputTelefone2" aria-describedby="telefoneHelp">
                                    <div id="telefoneHelp" class="form-text">Opcional</div>
                                    <div class="invalid-feedback">
                                        {{$errors->first("telefone_2")}}
                                    </div>
                                </div>
                            </div>
                            @if(session("msgSuccess"))
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        <div class="alert alert-success text-center" role="alert">
                                            {{session("msgSuccess")}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endsection