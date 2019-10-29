<!DOCTYPE html>
<html>
<head>
    <title>Inscrição</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
    <!-- JQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <!-- SweetAlert 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    <style>
            /* Start by setting display:none to make this hidden.
            Then we position it in relation to the viewport window
            with position:fixed. Width, height, top and left speak
            for themselves. Background we set to 80% white with
            our animation centered, and no-repeating */
            .modal {
                display:    none;
                position:   fixed;
                z-index:    1000;
                top:        0;
                left:       0;
                height:     100%;
                width:      100%;
                background: rgba( 255, 255, 255, .8 )
                            url('{{asset("ajax-loader.gif")}}')
                            50% 50%
                            no-repeat;
            }

            /* When the body has the loading class, we turn
            the scrollbar off with overflow:hidden */
            body.loading .modal {
                overflow: hidden;
            }

            /* Anytime the body has the loading class, our
            modal element will be visible */
            body.loading .modal {
                display: block;
            }
    </style>
    <script>
        jQuery(document).ready(function ($) {
            $('.cpf').mask('000.000.000-00', {reverse: false});


            $(".search").click(function(e){
                e.preventDefault();
                var data = $(this).closest('form').serialize();
                $('body').addClass("loading");
                $.ajax({
                    type: 'POST',
                    url: "{{url('/search')}}",
                    data: data,
                    dataType: 'JSON',
                    success: function (results) {
                        $('body').removeClass("loading");
                        if (results.success === true) {
                            $("#professional-data").html('<label for="inscricao">Inscrição</label>'+
                            '<input type="text" class="form-control mb-4" name="inscricao" value="'+results.professional.inscricao+'" readonly>'+
                            '<label for="nome">Nome completo:</label>'+
                            '<input type="text" class="form-control mb-4" name="nome" value="'+results.professional.nome+'" readonly>'+
                            '<label for="cpf">CPF:</label>'+
                            '<input type="text" class="form-control mb-4" name="cpf" value="'+results.professional.cpf+'" readonly>'+
                            '<button id="subscript" class="btn btn-info btn-block my-4">Inscrever</button>');
                        } else {
                            swal("Opa!", results.message, "warning");
                        }
                    },
                    error: function (reject) {
                        if( reject.status === 422 ) {
                            var errors = $.parseJSON(reject.responseText);
                            swal(errors.errors.cpf[0], '', "error");
                        }
                    }
                });
            });

            $(document).on("click", "#subscript", function (e) {
                e.preventDefault();
                var data = $(this).closest('form').serialize();
                $.ajax({
                    type: 'POST',
                    url: "{{url('/subscript/1')}}",
                    data: data,
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal("Ok!", results.message, "success");
                        } else {
                            swal("Opa!", results.message, "warning");
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>

<div class="container">
    <div class="form-group">
        <form id="search-form" action="" class="border border-light p-5">
            @csrf
            <label class="" for="cpf">Insira seu CPF abaixo:</label>
            <input type="text" value="@if($professional ?? '' != null) {{old('cpf', $professional[0]->cpf)}} @endif" name="cpf" class="cpf form-control mb-4" placeholder="CPF: 123.456.789-00" required>
            <button id="search" class="search btn btn-info btn-block my-4">Buscar inscrição</button>
        </form>
        <form id="subscript-form" class="border border-light p-5">
            @csrf
            <div id="professional-data" class="form-group">
            </div>
        </form>
    </div>
</div>
<div class="modal"><!-- Place at bottom of page --></div>
</body>
</html>
