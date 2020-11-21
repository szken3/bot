<?php

// Composer でライブラリの一括読み込み
require_once __DIR__ . '/vender/autoload.php';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('CHANEL_ACCESS_TOKEN'));

$bot = new \LINE\LINEBot($httpClient, ['chanelSelect' => getenv('CHANEL_SECRET')]);

$signature = $_SERVER['HTTP_' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];

$events = $bot->parseEventRequest(file_get_contents('php://input'), $signature);

foreach($events as $event){
  $bot->replyText($event->getReplyToken(), 'TextMessage');
}

 ?>
