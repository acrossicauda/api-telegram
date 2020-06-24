<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .center {
            float: none;
            margin: auto;
        }

        .row {
            margin-top: 10px;
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
</head>
<body>
    <div class="content">

        <div class="row">
            <div class="col-md-8 center">
                <div class="alert" id="alert" id="alert" role="alert" style="display: none">
                    <span class="msg" id="msg"></span>
                </div>
            </div>
        </div>
        <div class="col-md-12">

            <div class="col-md-4 center">
                <div class="row title">
                    <h1>Teste API Telegram</h1>
                </div>

                <div class="row body">

                    <form action="" method="post" id="form">
                        {{ csrf_field() }}
                        <div class="row">
                            <span>Método</span>
                            <select  class="form-control" placeholder="method" name="method" id="method">
                                <option value="sendMessage">Enviar Mensagem</option>
                                <option value="getMe">Buscar Informações</option>
                            </select>
                        </div>

                        <div id="data_user">
                            <div class="row">
                                <span>Nome Completo</span><input class="form-control" placeholder="nameFull" type="text" name="nameFull" id="nameFull" required>
                            </div>
                            <div class="row">
                                <span>User Name</span><input class="form-control" placeholder="userName" type="text" name="userName" id="userName" required>
                            </div>
                        </div>

                        <div id="data_api">
                            <div class="row">
                                <span>ID da API</span><input class="form-control" placeholder="apiID" type="text" name="apiID" id="apiID" required>
                            </div>
                            <div class="row">
                                <span>HASH da API</span><input class="form-control" placeholder="apiHash" type="text" name="apiHash" id="apiHash" required>
                            </div>
                        </div>


                        <div id="data_bot">
                            <div class="row">
                                <span>CHAT ID</span><input class="form-control" placeholder="ChatID" type="text" name="ChatID" id="ChatID">
                            </div>
                            <div class="row">
                                <span>BOT ID</span><input class="form-control" placeholder="BotID" type="text" name="BotID" id="BotID">
                            </div>
                            <div class="row">
                                <span>BOT KEY</span><input class="form-control" type="text" placeholder="BotKey" name="BotKey" id="BotKey">
                            </div>
                        </div>
                        <div class="row">
                            <span>Mensagem</span>
                            <textarea class="form-control" placeholder="message" name="message" id="message" cols="30" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <span></span><button class="btn btn-success" name="send" id="send">Enviar</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
    <script>

        $( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            //console.log( $( this ).serialize() );

            var data = $( this ).serialize();
            //window.teste = data;

            $.ajax({
                method: "POST",
                url: "./telegram-teste",
                data: data
            }).done(function(dataRet) {
                console.log(dataRet);
                toogleAlert(true,'Sucesso');
                //$( this ).addClass( "done" );
            })
            .fail(function(dataRet) {
                window.error = dataRet;
                console.log(dataRet.responseText);
                //alert( "error" );
                toogleAlert(false,`Falha: ${dataRet.statusText}`);
            });
        });

        // Só deve aparecer em alguns caso, mas ainda tem que definir
        // conforme for implementando novos metodos
        $( "#method" ).change(function() {
            //$( "#data_api" ).toggle( "slow", function() {});
        });

        /**
         * @param status => true para sucesso ou false para falha
         * @param msg
         */
        function toogleAlert(status, msg) {
            var msgRet = 'Não houve Retorno';
            var addClass = 'alert-danger';
            if(status) {
                addClass = 'alert-success';
            }

            if(msg != '') {
                msgRet = msg;
            }

            $('#msg').text(msgRet);

            $( "#alert" ).toggle( "slow", function() {
                $(this).addClass(addClass)

            });

            setTimeout(function () {
                // $(".alert").alert('close');
                // $(".alert").removeClass(addClass)
                // $('#msg').text('');

                $( "#alert" ).toggle( "slow", function() {
                    $(this).removeClass(addClass)
                    $('#msg').text('');
                });
            }, 9000);

        }
    </script>
</body>
</html>
