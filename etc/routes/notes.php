<?php

$slim->get('/', function() use($slim, $app) {
    $slim->render('layout.tpl', array(
        'content' => ''
    ));
});



?>
