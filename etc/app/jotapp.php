<?php

use JotCurate\Application;

// TODO: Determine the environment from the current context
$env = 'DEV';

$app = Application::getInstance();
$app->setConfig((object)$config[$env]);


?>
