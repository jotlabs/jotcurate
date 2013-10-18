<?php
$requestStartTime = microtime(true);

# Already defined in etc/www/index.php:
if (!defined('BASE_DIR')) { define('BASE_DIR', dirname(dirname(__FILE__))); }
if (!defined('DOC_ROOT')) { define('DOC_ROOT',  BASE_DIR . '/etc/www');     }

# Standard structure of a jot application
define('APP_ROOT',     BASE_DIR . '/etc/app');
define('JOT_ROOT',     BASE_DIR . '/etc/jotapp');
define('LIB_ROOT',     BASE_DIR . '/lib');
define('DATA_ROOT',    BASE_DIR . '/data');

require_once BASE_DIR . '/vendor/autoload.php';

# Initialise the web app framework
require_once JOT_ROOT . '/web-slim.php';

# Application configuration
require_once APP_ROOT . '/config.php';
require_once APP_ROOT . '/jotapp.php';

# Web application routes
require_once APP_ROOT . '/route.php';

# Process request
$slim->run();


$requestEndTime  = microtime(true);
$requestDuration = ceil(($requestEndTime - $requestStartTime) * 1000); 
# TODO: Fix when the response type is known, otherwise we break JSON requests.
#echo "<!-- Time taken: $requestDuration milliseconds -->";
?>
