@extends('layouts.app')

@section('content')
    <h1 class="text-center">Recepcionistas</h1>

    <div>
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($recepcionistas as $recepcionista)                
                <tr>
                    <th scope="row">{{$recepcionista->id}}</th>
                    <td>{{$recepcionista->nome}}</td>

                    <td style="display:flex">
                        <form action="{{url("/recepcionista/destroy/{$recepcionista->id}")}}" method="post">
                            @csrf
                            <button type="submit" class='btn btn-danger'>Deletar</button>
                        </form>
                        <a href="{{url("/recepcionista/$recepcionista->id/edit")}}">
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
        <a href="{{url('/')}}">
            <button class="btn btn-primary">Voltar</button>
        </a>
        <a href="{{url('/recepcionista/create')}}">
            <button class="btn btn-primary">Cadastrar novo recepcionista</button>
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
