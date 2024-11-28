<?php
require 'vendor/autoload.php';

$app = new \Slim\App();

$app->get('/', function($request, $response, $args) { 
    $response->write('Hola Mundo Slimm!!!');
    return $response;
});

$app->get('/hola[/{nombre}]', function($request, $response, $args) {
    $nombre = isset($args['nombre']) ? $args['nombre'] : 'Mundo'; 
    $response->write('Hola, ' . $nombre);
    return $response;
});

$app->post('/pruebapost', function($request, $response, $args) {
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost["val1"];
    $val2 = $reqPost["val2"];

    $response->write("Valores:". $val1 ." ". $val2 ."");
    return $response;
});

$app->run();
