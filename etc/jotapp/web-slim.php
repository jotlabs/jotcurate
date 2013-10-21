<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use JotApp\Middleware\User;


# FIXME: fix handling of markdown.
# Enable markdown extension to Twig
####include_once LIB_ROOT . '/Twig/Extensions/Core.php';
####Twig::$twigExtensions = array('Twig_Extensions_Slim', new Twig_Markdown_Extension());

$view = new Twig();
$view->parserExtensions = array(
    new TwigExtension()
);

# Create a Slim instance
$slim = new Slim(array(
	'view'           => $view,
	'templates.path' => BASE_DIR . '/etc/templates'
));

# Add Middleware to handle logged in users
$slim->add(new User());

?>
