@extends('layouts.app')

@section('content')
    <h1 class="text-center">Medicos</h1>

    <div>
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($medicos as $medico)                
                <tr>
                    <th scope="row">{{$medico->id}}</th>
                    <td>{{$medico->nome}}</td>

                    <td style="display:flex">
                        <form action="{{url("/medico/destroy/{$medico->id}")}}" method="post">
                            @csrf
                            <button type="submit" class='btn btn-danger'>Deletar</button>
                        </form>
                        <a href="{{url("/medico/$medico->id/edit")}}">
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
        <a href="{{url('/medico/create')}}">
            <button class="btn btn-primary">Cadastrar novo medico</button>
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
