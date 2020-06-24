<?php
/**
 * Created by PhpStorm.
 * User: tiago
 * Date: 03/06/2020
 * Time: 21:37
 */

/**
 * URLs:
 * https://core.telegram.org/bots/samples
 * https://core.telegram.org/bots/webhooks
 * https://core.telegram.org/bots/api
 * https://telegram.me/acrossicauda_bot
 * https://my.telegram.org/apps
 * https://core.telegram.org/bots#3-how-do-i-create-a-bot
 * https://core.telegram.org/widgets/login
 * https://gist.github.com/anonymous/6516521b1fb3b464534fbc30ea3573c2#file-check_authorization-php
 * https://core.telegram.org/
 * https://github.com/ThingEngineer/PHP-MySQLi-Database-Class/tree/6e13d5a82d2ac0eb71c2a2a30681ecea7e21e8f4
 * https://www.phpclasses.org/package/10149-PHP-Send-and-receive-messages-to-Telegram-users.html
 * Outros:
 * https://www.phpclasses.org/package/9493-PHP-Send-messages-and-other-commands-to-Telegram-users.html
 * https://www.phpclasses.org/search.html?words=REST+API&restrict[0]=C&restrict[1]=B&restrict[2]=D&forums=F&go_search=1&advanced=1
 * https://core.telegram.org/bots#6-botfather
 */


namespace App\Http\Controllers\telegram_api;

class telegram_config {

    private $debug = false;
    private $userName;
    private $nameFull;
    private $homoConfiguration;
    private $prodConfiguration;
    private $api_hash;
    private $api_id;
    private $botId;
    private $botKey;
    private $telegramMethod;

    private $config = array();


    /*
     * Debug MODE
     */
    public function setDebugMode($debug) {
        $this->debug = $debug;
    }
    public function getDebugMode() {
        return $this->debug;
    }


    // gets e sets do user de acesso
    public function setUserName($userName) {
        $this->userName = $userName;
    }
    public function getUserName() {
        return $this->userName;
    }

    // gets e sets do nome, passando o nome completo
    public function setNameFull($nameFull) {
        $this->nameFull = $nameFull;
    }
    public function getNameFull() {
        return $this->nameFull;
    }
    // pega o primeiro nome
    public function getFirstName() {
        if(trim($this->nameFull) != '') {
            $firstName = explode(" ", $this->nameFull);
            return $firstName[0];
        } else {
            return "";
        }
    }

    // gets e sets do da URL de homologação
    public function setHomoConfiguration($homoConfiguration) {
        $this->homoConfiguration = $homoConfiguration;
    }
    public function getHomoConfiguration() {
        return $this->homoConfiguration;
    }

    // gets e sets do da URL de produção
    public function setProdConfiguration($prodConfiguration) {
        $this->prodConfiguration = $prodConfiguration;
    }
    public function getProdConfiguration() {
        return $this->prodConfiguration;
    }

    // gets e sets do da hash da API
    public function setApi_hash($api_hash) {
        $this->api_hash = $api_hash;
    }
    public function getApi_hash() {
        return $this->api_hash;
    }

    // gets e sets do do ID da API
    public function setApi_id($api_id) {
        $this->api_id = $api_id;
    }
    public function getApi_id() {
        return $this->api_id;
    }

    /**
     * Criando bot
     * no chat do 'BotFather' do telegram:
     * - use o comando '/start'
     * - use o comando '/newbot' para criar o novo bot
     * - escolha o nome do bot
     * - escolha o user do bot
     * Após concluir a criação e configuração do bot,
     * irá aparece uma mensagem que contem o link para
     * o chat do bot e o token de acesso no formado
     * 'BOTID:'BOTKEY'
     * exem.: '123456789:AAAAAaaaAaaA2AAAAaAaA9AAa6aAaAaAAAa'
     */
    // gets e sets do ID do bot que foi criado
    public function setBotId($botId) {
        $this->botId = $botId;
    }
    public function getBotId() {
        return $this->botId;
    }

    // gets e sets da chave do bot que foi criado
    public function setBotKey($botKey) {
        $this->botKey = $botKey;
    }
    public function getBotKey() {
        return $this->botKey;
    }

    /*
     * gets e sets o metodo que será usado
     * sendMessage: envia mensagem
     */
    public function setTelegramMethod($telegramMethod = 'sendMessage') {
        $this->telegramMethod = $telegramMethod;
    }
    public function getTelegramMethod() {
        return $this->telegramMethod;
    }

    /**
     * @url: https://core.telegram.org/bots/api
     * Metodos e descrições:
     * -sendMessage :
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * Parameter	                Type	                Required	Description
     * 'chat_id'	                Integer or String	    Yes	        Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * 'text'	                    String	                Yes	        Text of the message to be sent
     * 'parse_mode'	                String	                Optional	Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
     * 'disable_web_page_preview'	Boolean	                Optional	Disables link previews for links in this message
     * 'disable_notification'	    Boolean	                Optional	Sends the message silently. Users will receive a notification with no sound.
     * 'reply_to_message_id'	    Integer	                Optional	If the message is a reply, ID of the original message
     * 'reply_markup'	            InlineKeyboardMarkup    Optional	Additional interface options. A JSON-serialized object for an inline keyboard,
     *                              or ReplyKeyboardMarkup              custom reply keyboard, instructions to remove reply keyboard or to force a reply from the user.
     *                              or ReplyKeyboardRemove
     *                              or ForceReply
     *
     *
     * -getUpdates
     * -getMe
     */
    private function setDefine() {
        define('DEBUG', $this->debug); // DEBUG

        define('USERNAME', $this->getUserName());
        define('FIRST_NAME', $this->getFirstName());
        define('TESTE_CONFIGURATION', $this->getHomoConfiguration());
        define('PROD_CONFIGURATION', $this->getProdConfiguration());
        define('API_HASH', $this->getApi_hash());

        define('API_ID', $this->getApi_id());
        /**
         * Monta URL:
         *https://api.telegram.org/bot{BOT_ID}:{BOT_KEY}/{METHOD}?{PARAMS}
         */
        define('BOT_ID', $this->getBotId());
        define('BOT_KEY', $this->getBotKey());

        // Metodo
        //define('TELEGRAM_METHOD', $this->getTelegramMethod()); // place username of your bot here
    }

    /**
     * Corrigir
     */
    public function setConfig_2() {

        $config['telegram'] = [
            'id'            => 0,
            'key'           => 'YOUR API KEY',
            'username'      => 'MyNameBot',
            'first_name'    => 'Tiago'
        ];

        $config['creator'] = 0; // Telegram User ID of bot owner
        $config['language'] = 'en'; // Default language
        $config['convert_emoji'] = TRUE; // Auto convert text to emoji.

        $config['mysql'] = [
            'host'      => 'localhost',
            'username'  => 'mysql',
            'password'  => '',
            'db'        => 'telegram',
            'port'      => 3306,
            'prefix'    => NULL,
            'charset'   => NULL
        ];

        $config['mysql']['enable'] = TRUE; // Enable MySQL Class / Service.

        $config['tracking'] = FALSE; // Tracking system to log and track bot/user actions.
// $config['tracking'] = ['Botan' => 'API KEY'];
// $config['tracking'] = ['GA' => 'UA-11111111-1'];

        $config['log'] = FALSE; // Log messages to file.
        $config['log_time'] = FALSE; // Log amount of time processing the message.
        $config['repeat_updateid'] = 3; // Amount of same ID messages you can receive before skipping.
        $config['ignore_older_than'] = 300; // If message is older than X seconds, ignore.
        $config['safe_connect'] = TRUE; // Only accept connections from Telegram (or custom servers if specified).
        $config['cache_memcached'] = FALSE; // Use Memcached PHP functions.
// $config['cache_memcached'] = [['127.0.0.1', 11211, 0]];

        $this->config = $config;

    }

    /**
     * Corrigir
     */
    public function send($data = NULL, $method = ''){
        //global $config;
        //$config = $this->config;
        //$url = 'https://api.telegram.org/bot' .$config['telegram']['id'] .':' .$config['telegram']['key'] .'/' .$method;
        // $botID = $config['telegram']['id'];
        // $botKey = $config['telegram']['key'];
        $botID = $this->getBotId();
        $botKey = $this->getBotKey();

        $method = ($method != '') ? $method : $this->getTelegramMethod();
        $url = 'https://api.telegram.org/bot' . $botID .':' . $botKey .'/' .$method;

        if($method == 'sendMessage') {
            $dataSend = [
                'chat_id' => "{$data['ChatID']}",
                'text' => $data['message']
            ];
            $data = http_build_query($dataSend);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        if($data && $method != 'getMe'){
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["POST"]);
            //curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type:multipart/form-data"]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        $response = curl_exec($ch);

        if ($response === false) {
            $errno = curl_errno($ch);
            $error = curl_error($ch);
            $msgErro = "Curl returned error $errno: $error\n";
            curl_close($ch);
            return ['success' => false, 'msg' => $msgErro, 'status' => 400];
        }

        $http_code = intval(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        curl_close($ch);
        $response = json_decode($response, TRUE);

        $response['dataSend'] = $data;
        $response['urlSend'] = $url;
        if($http_code != 200){

            $msgErro = "Request has failed with error {$response['error_code']}: {$response['description']}\n";
            if ($http_code == 401) {
                $msgErro = 'Invalid access token provided';
                return ['success' => false, 'msg' => $msgErro, 'status' => $http_code];
                //throw new \Exception('Invalid access token provided');
            }
            return ['success' => false, 'msg' => $response, 'status' => $http_code];

        }else{
            return ['success' => true, 'msg' => $response, 'status' => $http_code];
        }

    }




    public function setConfig($dataDebug = false) {

        if(!$dataDebug) {
            return ['success' => false,
                'msg' => 'Nenhuma informação foi passada para poder realizar os testes'];
        }

        $debug = false;
        if(isset($dataDebug['debug']) || $this->getDebugMode()) {
            $debug = true;
        }

        $this->setDebugMode($debug);
        $this->setUserName($dataDebug['userName']);
        $this->setNameFull($dataDebug['nameFull']);
        $this->setHomoConfiguration('149.154.167.40:443');
        $this->setProdConfiguration('149.154.167.50:443');
        $this->setApi_id($dataDebug['apiID']);
        $this->setApi_hash($dataDebug['apiHash']);
        $this->setBotId($dataDebug['BotID']);
        $this->setBotKey($dataDebug['BotKey']);


    }

    public function getAllParam() {
        $params = array();
        if($this->debug) {
            $params['DEBUG_MODE'] = $this->getDebugMode();
            $params['UserName'] = $this->getUserName();
            $params['FirstName'] = $this->getFirstName();
            $params['NameFull'] = $this->getNameFull();
            $params['HomoConfiguration'] = $this->getHomoConfiguration();
            $params['ProdConfiguration'] = $this->getProdConfiguration();
            $params['Api_hash'] = $this->getApi_hash();
            $params['Api_id'] = $this->getApi_id();
            $params['BotId'] = $this->getBotId();
            $params['BotKey'] = $this->getBotKey();
            $params['TelegramMethod'] = $this->getTelegramMethod();

            return $params;
        } else {
            return "Essa function só pode ser usada se o modo de DEBUG estiver ativado.";
        }
    }
}