@extends('layouts.app')

@section('content')

    <h1 class="text-center">@if(isset($recepcionista)) Editar @else Cadastrar @endIf</h1><hr>
    <div class="col-8 m-auto">
        @if(isset($recepcionista))
            <form name="formEdit" id="formEdit" method="post" action="{{url("/recepcionista/$recepcionista->id")}}">
            @method('PUT')
        @else 
            <form name="formCad" id="formCad" method="post" action="{{url('/recepcionista/store')}}">
        @endIf
        @csrf
        <input class="form-control" type="text" name="recepcionistaNome" id="" placeholder="Nome: " value="{{$recepcionista->nome ?? ''}}">
        <hr>
        <div class="text-center">
            <button type="submit" class="btn btn-success">@if(isset($recepcionista)) Editar @else Cadastrar @endIf</button>
        </div>
        </form>
        <div class="text-center">
            <a href="{{url("/recepcionista")}}">
                <button class="btn btn-secondary">Cancelar</button>
            </a>
        </div>
    </div>
@endsection