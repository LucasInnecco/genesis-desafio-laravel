@extends('layouts.app')

@section('content')
    <div>
        <a href="{{url('/medico')}}">
            <button class="btn btn-primary">Menu medico</button>
        </a>
        <a href="{{url('/recepcionista')}}">
            <button class="btn btn-primary">Menu recepcionista</button>
        </a>
    </div>
    <h1 class="text-center">Agendamentos</h1>

    <div>
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Cartao SUS</th>
                <th scope="col">Motivo</th>
                <th scope="col">Data do atendimento</th>
                <th scope="col">Urgencia</th>
                <th scope="col">Medico</th>
                <th scope="col">Agendador</th>
                <th scope="col">Acoes</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($agendamentos as $agendamento)
                @php
                    $pessoa=$agendamento->find($agendamento->id)->relPessoa;
                    $medico=$agendamento->find($agendamento->id)->relMedico;
                    $recepcionista=$agendamento->find($agendamento->id)->relRecepcionista;
                @endphp
                
                <tr>
                    <th scope="row">{{$agendamento->id}}</th>
                    <td>{{$pessoa->nome}}</td>
                    <td>{{$pessoa->cpf}}</td>
                    <td>{{$pessoa->cartaoSus}}</td>
                    <td>{{$agendamento->motivo}}</td>
                    <td>{{$agendamento->dataAtendimento}}</td>
                    <td>{{$agendamento->urgencia}}</td>
                    <td>{{$medico->nome}}</td>
                    <td>{{$recepcionista->nome}}</td>

                    <td style="display:flex">
                        <form action="{{url("/destroy/{$agendamento->id}")}}" method="post">
                            @csrf
                            <button type="submit" class='btn btn-danger'>Deletar</button>
                        </form>
                        <a href="{{url("/$agendamento->id/edit")}}">
                            <button class='btn btn-primary'>Editar</button>
                        </a>
                    </td>
                </tr>
                
            @endforeach
            </tbody>
          </table>
    </div>

    <hr>

    <div class="text-center mt-1 mb-2">
        <a href="{{url('/create')}}">
            <button class="btn btn-primary">Novo agendamento</button>
        </a>
    </div>
@endsection

@push('styles')
    <style>
        .teste {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
    </style>
@endpush
