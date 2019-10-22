<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 Autocomplete Search using Bootstrap Typeahead JS - ItSolutionStuff.com</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
    <!-- JQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>

        $(document).ready(function(){
            $('.cpf').mask('000.000.000-00', {reverse: false});
        });
    </script>
</head>
<body>

<div class="container">
    <div class="form-group">
        <form class="border border-light p-5" action="{{route('search')}}" method="POST">
            @csrf
            <input type="text" id="cpf" name="cpf" class="form-control mb-4" placeholder="CPF: 123.456.789-00">
            <button class="btn btn-info btn-block my-4" type="submit">Buscar inscrição</button>
        </form>
    </div>
</div>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
@if($notification ?? '' != null)
    {{$notification}}
@endif
@if($professional ?? '' != null)
    <div id="result" class="container">
        @if(!$professional->isEmpty())
            <div class="row">
                <div class="form-group col-8">
                    <label for="inscricao">Inscrição</label>
                    <input type="text" class="form-control" id="inscricao" value="{{$professional[0]->inscricao}}" readonly>
                </div>
                <div class="form-group col-8">
                    <label for="nome">Nome completo:</label>
                    <input type="text" class="form-control" id="nome" value="{{$professional[0]->nome}}" readonly>
                </div>
                <div class="form-group col-8">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" value="{{$professional[0]->cpf}}" readonly>
                </div>
                <div class="form-group col-12">
                    <button id="search" type="submit" class="btn btn-primary">Inscrever</button>
                </div>
            </div>
        @else
            <p>Inscrição inválida!</p>
        @endif
    </div>
@endif

<script type="text/javascript">
    $(document).ready(function(){
        $('.multiple-subscriptions').hide();

        $('#sel1').on('change',function(){
            $('.multiple-subscriptions').hide();
            var inscricao = $(this).children('option:selected').data('inscricao');
            $('#'+inscricao).show();
        });
    });
</script>

</body>
</html>
