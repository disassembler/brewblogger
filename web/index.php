<?php

use Symfony\Component\Debug\Debug;

require_once __DIR__.'/../vendor/autoload.php';

//Debug::enable();

// TODO: remove global after LegacyController retired.
$twig = NULL;
global $twig;

$app = new BrewBlogger\Application();
$app->run();
