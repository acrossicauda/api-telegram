<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 03/06/2020
 * Time: 21:23
 */

/**
 * https://core.telegram.org/bots/api
 */

namespace App\Http\Controllers\telegram_api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//require_once './telegram/telegram_config.php';

class telegram extends telegram_config {

    public function show() {
        //return view('ApiTeste.whatsapp_teste');
        //parent::show2();
        //return 'Hello World! ';
    }



    /**
     * Funções para uso em testes
     */
    public function createApi(Request $request) {

        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'method' => 'required|string',
                'userName' => 'required|string',
                'nameFull' => 'required|string',
                'apiID' => 'required|string',
                'apiHash' => 'required|string',
                'BotID' => 'required|string',
                'BotKey' => 'required|string',
                'message' => 'required|string',
            ]
        );

        parent::setDebugMode(false);

        $status = 400;
        if($validator->fails()) {
            $response = $validator->messages();
        } else {

            parent::setConfig($data);
            parent::setTelegramMethod($data['method']);
            //parent::setTelegramMethod("sendMessage");
            //$response = parent::send($data);
            //$response = ['success' => true, 'msg' => 'Sucesso'];
            //$status = 200;
            //$msg = $data['message'];
            $response = parent::send($data);

            $status = $response['status'];

        }

//        print_r("<pre>");
//        print_r(parent::getAllParam());
//        print_r("Enviando MSG");
//        $msg = 'Testando Envio de Mensagem pelo Telegram Usando o Laravel.';
//        print_r(parent::send($msg));

        return response()->json( $response, $status );
    }


    /**
     * Funções para uso em testes
     */

    /**
     * Class para testes da API, será usado na pagina 'http://localhost:8080/telegram-teste'
     * A função dela será de validar os dados principais para conectar com a API e enviar
     * um 'POST' para a class 'telegram' fazendo a execução da API
     *
     * Method -> de Inicio só terá o de enviar mensagens, talvez o de listar
     * BotID -> Adicionar infos de como obter
     * BotKey -> Obter Infos de como obter
     * Mensagem -> texto livre, por enquanto irei limitar a quantidade de caracteres
     */
    public function sendTeste(Request $request) {
        $data = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'method' => 'required|string',
                'userName' => 'required|string',
//                'nameFull' => 'required|string',
//                'apiID' => 'required|string',
//                'apiHash' => 'required|string',
//                'ChatID' => 'required|string',
//                'BotID' => 'required|string',
//                'BotKey' => 'required|string',
//                'message' => 'required|string',
            ]
        );

        parent::setDebugMode(true);

        $status = 400;
        if($validator->fails()) {
            $response = $validator->messages();
        } else {

            // Habilita o modo de debug e ambiente de homologação
            //$validator['debug'] = true;
            parent::setConfig($data);
            parent::setTelegramMethod($data['method']);

            //$msg = $data['message'];
            $response = parent::send($data);

            $status = $response['status'];

        }

        return response()->json( $response, $status );
        //return json_encode( ['message' => 'Teste Retorno'] );
    }


}
