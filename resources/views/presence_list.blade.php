@extends('voyager::master')

@section('page_header')
    <style type="text/css">
        @media print {
            .yesprint_header{
                visibility: visible;
                position: absolute;
                top:0;
                left:0;
            }
            .yesprint_body{
                visibility: visible;
                margin-left: -5%;
                top:0;
                left:0;
            }

            .container{
                width: 100%;
            }
            .email{
                width:250px;
            }
            .celular{
                width:150px;
            }
        }
    </style>
    <div class="yesprint_header container-fluid">
        <h1 class="page-title">
            <i class="voyager-ticket"></i> {{$event->event_title}} - Lista de Presença
        </h1>
        <button class="btn btn-primary hidden-print" onclick="window.print()">Imprimir</button>
    </div>
@stop

@section('content')
    <div class="page-content yesprint_body">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-bordered">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>CPF</th>
                                                    <th class="email">E-mail</th>
                                                    <th class="celular">Celular</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($event->subscriptions as $s)
                                                <tr>
                                                    <td>{{$s->professional->nome}}</td>
                                                    <td>{{$s->professional->cpf}}</td>
                                                    <td></td>
                                                    <td></td>
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
