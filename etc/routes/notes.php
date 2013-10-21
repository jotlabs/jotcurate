<?php

$slim->get('/', function() use($slim, $app) {
    $slim->render('page-types/list.tpl', array(
        'content' => 'Show all notes'
    ));
})->name('allNotes');


$slim->post('/', function() use($slim, $app) {
    $params = $slim->request()->post();
    echo '<h1>Adding a new note:</h1>';
    echo '<pre>Params: '; print_r($params); echo '</pre>';

})->name('saveNote');


$slim->get('/:slug', function($slug) use($slim, $app) {
    $slim->render('layout.tpl', array(
        'content' => "Show note: $slug"
    ));

});


$slim->put('/:slug', function($slug) use($slim, $app) {
    $slim->render('layout.tpl', array(
        'content' => "Update note: $slug"
    ));

});



?>
