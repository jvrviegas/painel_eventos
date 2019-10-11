@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-bordered">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Inscrição Coren</th>
                                                    <th>Nome</th>
                                                    <th>Evento</th>
                                                    <th>Presença</th>
                                                    <th>Realizada em</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($subscriptions as $s)
                                                <tr>
                                                    <td>{{$s->professional->inscricao}}</td>
                                                    <td>{{$s->professional->nome}}</td>
                                                    <td>{{$s->event->event_title}}</td>
                                                    <td>
                                                        @if($s->presence)
                                                            Presente
                                                        @else
                                                            Ausente
                                                        @endif
                                                    </td>
                                                    <td>{{$s->created_at}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </div>
@stop
