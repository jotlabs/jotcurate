<?php

use Slim\Slim;
use Slim\Extras\Views\Twig;
use JotApp\Middleware\User;


# Standard Slim Twig templating setup
Twig::$twigDirectory  = BASE_DIR . '/vendor/twig/twig/lib/Twig';


# FIXME: fix handling of markdown.
# Enable markdown extension to Twig
####include_once LIB_ROOT . '/Twig/Extensions/Core.php';
####Twig::$twigExtensions = array('Twig_Extensions_Slim', new Twig_Markdown_Extension());

# Create a Slim instance
$slim = new Slim(array(
	'view'           => new Twig(),
	'templates.path' => BASE_DIR . '/etc/templates'
));

# Add Middleware to handle logged in users
$slim->add(new User());

?>
