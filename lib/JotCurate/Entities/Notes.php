<?php
namespace JotCurate\Entities;

use JotApp\Utils\Slug;
use JotContent\Entity;

class Notes extends Entity {

    static $models = array(
        'notes' => array(
            'insert' => 'INSERT INTO `notes` VALUES(NULL, :title, :slug, :text, :dateAdded);',
            'bySlug' => 'SELECT * FROM `notes` WHERE slug = :slug LIMIT 0,1;',
            'all'    => 'SELECT * from `notes` ORDER BY dateAdded DESC;'
        )
    );


    public function addNote($note) {
        $noteSlug = Slug::slugify($note->title);

        $response = $this->dataSource->add('notes', array(
            'title'     => $note->title,
            'slug'      => $noteSlug,
            'text'      => $note->text,
            'dateAdded' => date('Y-m-d H:i:s')
        ));

        if ($response) {
            $response = $this->getBySlug($noteSlug);
        }
        
        return $response;
    }


    public function getBySlug($slug) {
        return $this->dataSource->findOne('notes', 'bySlug', 'JotCurate\Models\Note', array(
            'slug' => $slug
        ));
    }


    public function getNotes() {
        return $this->dataSource->findAll('notes', 'all', 'JotCurate\Models\Note');
    }

}

?>
