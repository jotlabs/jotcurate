<?php

$slim->get('/', function() use($slim, $app) {
    $slim->render('page-types/list.tpl', array(
        'content' => 'Show all notes'
    ));
})->name('allNotes');


$slim->post('/', function() use($slim, $app) {
    $slim->render('layout.tpl', array(
        'content' => "Add new note"
    ));
    
});


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
