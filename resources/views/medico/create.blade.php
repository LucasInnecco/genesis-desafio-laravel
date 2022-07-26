@extends('layouts.app')

@section('content')

    <h1 class="text-center">@if(isset($medico)) Editar @else Cadastrar @endIf</h1><hr>
    <div class="col-8 m-auto">

        @if(isset($medico))
            <form name="formEdit" id="formEdit" method="post" action="{{url("/medico/$medico->id")}}">
            @method('PUT')
        @else 
            <form name="formCad" id="formCad" method="post" action="{{url('/medico/store')}}">
        @endIf
        @csrf
        <input class="form-control" type="text" name="medicoNome" id="" placeholder="Nome: " value="{{$medico->nome ?? ''}}">
        <hr>
        <div class="text-center">
            <button type="submit" class="btn btn-success">@if(isset($medico)) Editar @else Cadastrar @endIf</button>
        </div>
        </form>
        <div class="text-center">
            <a href="{{url("/medico")}}">
                <button class="btn btn-secondary">Cancelar</button>
            </a>
        </div>
    </div>
@endsection