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
<<<<<<< HEAD
$app = new \Phalcon\Mvc\Application($di);

echo $app->handle()->getContent();
=======
$application = new \Phalcon\Mvc\Application($di);

echo $application->handle()->getContent();
>>>>>>> f6f4725d1343c175c0293a3d04b78ab542148db4
