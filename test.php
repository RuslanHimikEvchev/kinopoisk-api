<?php

error_reporting(1);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';


$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$method = $request->get('method');
$params = $request->get('params');

$server = \Kinopoisk\Type\ServerEndpointType::SERVER_PRODUCTION;
$blueprint =  new \Kinopoisk\Blueprint('blueprint.json');

$api = new \Kinopoisk\Api\Gateway($server, $blueprint);

$res = $api->call('searchFilms', [
    'keyword' => 'Клиника'
]);

print_r($res);