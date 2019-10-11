<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 Autocomplete Search using Bootstrap Typeahead JS - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</head>
<body>

<div class="container">
    <h1>Buscar inscrito</h1>
    <div class="form-group">
        <form action="{{route('search')}}" method="POST">
            @csrf
            <div class="form-group">
                <label>Número de inscrição</label>
                <input class="form-control" name="inscricao" placeholder="Inscrição - Ex: 123456-TE" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</div>
@if($professional != null)
@foreach($professional as $p)
<div id="result" class="container">
    <div class="row">
        <div class="form-group col-8">
            <label for="inscricao">Inscrição</label>
            <input type="text" class="form-control" id="inscricao" value="{{$p->inscricao}}" readonly>
        </div>
        <div class="form-group col-8">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" value="{{$p->nome}}" readonly>
        </div>
        <div class="form-group col-8">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" value="{{$p->cpf}}" readonly>
        </div>
        <div class="form-group col-12">
            <button id="search" type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</div>
@endforeach
@else
    Teste
@endif

{{-- <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script> --}}

</body>
</html>
