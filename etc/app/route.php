<?php

$slim->get('/', function() use($slim) {
    $slim->render('layout.tpl', array(
        'content' => 'Hello World!'
    ));
});

?>
