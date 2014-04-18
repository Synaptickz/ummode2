<?php

/**
 * Read the configuration file
 */
$config = new Phalcon\Config\Adapter\Ini('../app/config/config.ini');

/**
 * The autoloader registers a set of directories in which the
 * application will look for the classes that iteventually will need.
 */
$loader = new \Phalcon\Loader();

$loader->registerNamespaces(array(
    'App\Controllers' => $config->application->controllersDir,
    'App\Models' => $config->application->modelsDir,
    'App\Languages' => $config->application->languagesDir
))->register();

require __DIR__ . "/../app/services.php";

/**
 * Handle the request
 */
$app = new \Phalcon\Mvc\Application($di);

echo $app->handle()->getContent();
