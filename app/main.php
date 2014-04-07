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
$loader->registerDirs(
    array(
        $config->application->controllersDir,
        $config->application->pluginsDir,
        $config->application->libraryDir,
        $config->application->modelsDir,
    )
)->register();

include __DIR__ . "/../app/services.php";

/**
 * Handle the request
 */
$app = new \Phalcon\Mvc\Application($di);

echo $app->handle()->getContent();
