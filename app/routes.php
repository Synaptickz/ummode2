<?php

$router = new Phalcon\Mvc\Router(false);
$router->setDefaultAction('index');
$router->setDefaultController('index');
$router->setDefaultNamespace('App\Controllers');

/**
 * FRONTEND
 */
$router->add('/:controller/:action/:params', array(
    'namespace' => 'App\Controllers',
    'controller' => 1,
    'action' => 2,
    'params' => 3
));

$router->add('/:controller', array(
    'namespace' => 'App\Controllers',
    'controller' => 1
));

$router->add('/', array(

));

/**
 * Backend
 */
$router->add('/admin/:controller/:action/:params', array(
    'namespace' => 'App\Controllers\Admin',
    'controller' => 1,
    'action' => 2,
    'params' => 3
));

$router->add('/admin/:controller', array(
    'namespace' => 'App\Controllers\Admin',
    'controller' => 1
));

$router->add('/admin/', array(
    'namespace' => 'App\Controllers\Admin'
));

$router->add('/admin', array(
    'namespace' => 'App\Controllers\Admin'
));

/**
 * ERROR 404 - Page not found
 */
$router->notFound(array(
    'namespace' => 'App\Controllers',
    'controller' => 'error',
    'action' => 'show404'
));

return $router;
