<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="row title">
        <h1>Teste API Whatsapp</h1>
    </div>
    <div class="row body">
        <form action="./" method="post">
            {{ csrf_field() }}}
            <div class="row">
                <span>Número Destinatário</span><input class="form-control" type="text" name="num_dest" id="num_dest">
            </div>
            <div class="row">
                <span>Nome Remetente</span><input class="form-control" type="text" name="name_rem" id="name_rem">
            </div>
            <div class="row">
                <span>Texto</span><input class="form-control" type="text" title="Texto que será enviado" data-tool="tooltip" name="desc" id="desc">
            </div>
            <div class="row">
                <span></span><input class="btn btn-default" type="submit" value="Enviar" name="send" id="send">
            </div>
        </form>
    </div>
</div>

</body>
</html>
