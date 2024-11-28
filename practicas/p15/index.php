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



$app->run();
