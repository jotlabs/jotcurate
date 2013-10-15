<?php
namespace JotCurate\Entities;

use JotApp\Utils\Slug;
use JotContent\Entity;

class Notes extends Entity {

    static $models = array(
        'notes' => array(
            'INSERT' => 'INSERT INTO `notes` VALUES(NULL, :title, :slug, :text, NOW());'
        )
    );


    public function addNote($note) {
        return $this->add('notes', array(
            'title' => $note->title,
            'slug'  => Slug::slugify($note->title),
            'text'  => $note->text
        ));
    }
}

?>