@extends('layouts.app')

@section('content')

    <h1 class="text-center">@if(isset($agendamento))Editar @else Cadastrar @endIf</h1><hr>

    <div class="col-8 m-auto">

        <!-- mostrar mensagem de erro caso tente fazer um atendimento em horário que já exista --> 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>A data de atendimento está ocupada.</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(isset($agendamento))
            <form name="formEdit" id="formEdit" method="post" action="{{url("/$agendamento->id")}}">
                @method('PUT')
        @else 
            <form name="formCad" id="formCad" method="post" action="{{url('/store')}}">
        @endIf
        @csrf
        <input class="form-control" type="text" name="pacienteNome" id="" placeholder="Nome: " value="{{$agendamento->relPessoa->nome ?? ''}}">
        <input class="form-control" type="text" name="cpf" id="" placeholder="CPF: " value="{{$agendamento->relPessoa->cpf ?? ''}}">
        <input class="form-control" type="text" name="cartaoSus" id="" placeholder="Cartao SUS: " value="{{$agendamento->relPessoa->cartaoSus ?? ''}}">
        <input class="form-control" type="text" name="motivo" id="" placeholder="Motivo: " value="{{$agendamento->motivo ?? ''}}">
        <select class="form-control" name="urgencia" id="">
            <option  selected value="{{$agendamento->urgencia ?? ''}}">{{$agendamento->urgencia ?? 'Urgencia'}}</option>
            <option value="Baixa">Baixa</option>
            <option value="Media">Media</option>
            <option value="Alta">Alta</option>
            <option value="Urgente">Urgente</option>
        </select>
        <select class="form-control" type="text" name="medicoNome" id="" placeholder="Nome do medico: ">
            <option  selected value="{{$agendamento->relMedico->id ?? ''}}">{{$agendamento->relMedico->nome ?? 'Medico'}}</option>
            @foreach ($medico as $medicos)
                @php
                    $medico=$medicos->find($medicos->id);
                @endphp
                <option value="{{$medico->id}}">{{$medico->nome}}</option>
            @endforeach
        </select>
        <select class="form-control" type="text" name="recepcionistaNome" id="" placeholder="Nome do recepcionista: ">
            <option  selected value="{{$agendamento->relRecepcionista->id ?? ''}}">{{$agendamento->relRecepcionista->nome ?? 'Recepcionista'}}</option>
            @foreach ($recepcionista as $recepcionistas)
                @php
                    $recepcionista=$recepcionistas->find($recepcionistas->id);
                @endphp
                <option value="{{$recepcionista->id}}">{{$recepcionista->nome}}</option>
            @endforeach
        </select>

        <label for="calendario">Escolha um horario para seu atendimento:</label>

        <input type="datetime-local" name="dataAtendimento" value="{{$agendamento->dataAtendimento ?? ''}}">
        <hr>
        <div class="text-center">
            <button type="submit" class="btn btn-success">@if(isset($agendamento))Editar @else Cadastrar @endIf</button>
        </div>
        </form>
        <div class="text-center">
            <a href="{{url("/")}}">
                <button class="btn btn-secondary">Cancelar</button>
            </a>
        </div>
    </div>
@endsection