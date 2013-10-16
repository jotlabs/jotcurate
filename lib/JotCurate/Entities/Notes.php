<?php
namespace JotCurate\Entities;

use JotApp\Utils\Slug;
use JotContent\Entity;

class Notes extends Entity {

    static $models = array(
        'notes' => array(
            'INSERT' => 'INSERT INTO `notes` VALUES(NULL, :title, :slug, :text, NOW());',
            'bySlug' => 'SELECT * FROM `notes` WHERE slug = :slug LIMIT 0,1'
        )
    );


    public function addNote($note) {
        return $this->add('notes', array(
            'title' => $note->title,
            'slug'  => Slug::slugify($note->title),
            'text'  => $note->text
        ));
    }

    public function getBySlug($slug) {
        return $this->dataSource->findOne('notes', 'bySlug', 'JotCurate\Models\Note', array(
            'slug' => $slug
        ));
    }
}

?>
