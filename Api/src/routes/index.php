<?php

use function src\slimConfiguration;
use App\Controller\Crud;


$app = new \Slim\App(slimConfiguration());

$app->group('/Crud', function () use ($app) {

    $app->post('/Users', Crud::class . ':PostUsers');
    $app->get('/Users', Crud::class . ':GetUsers');
    $app->delete('/Users/{id}', Crud::class . ':DeleteUsers');
    $app->put('/Users/{id}', Crud::class . ':UpdateUsers');


});




// Run app
$app->run();