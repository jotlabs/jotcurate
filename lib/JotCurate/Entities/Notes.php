<?php
namespace JotCurate\Entities;

use JotApp\Utils\Slug;
use JotContent\Entity;

class Notes extends Entity {

    static $models = array(
        'notes' => array(
            'insert' => 'INSERT INTO `notes` VALUES(NULL, :title, :slug, :text, :dateAdded);',
            'update' => 'UPDATE `notes` SET title = :title, text = :text WHERE _id = :noteId;',

            'all'    => 'SELECT * from `notes` ORDER BY dateAdded DESC;',
            'bySlug' => 'SELECT * FROM `notes` WHERE slug = :slug LIMIT 0,1;'
        )
    );


    public function addNote($note) {
        $slugText = ($note->title)? $note->title : $this->_generateTitleFromText($note->text);
        $noteSlug = Slug::slugify($slugText);

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


    public function updateNote($note) {
        $response = $this->dataSource->update('notes', array(
            'noteId' => $note->getPrimaryKey(),
            'title'  => $note->title,
            //'slug'   => $note->slug, # Should slug change on update?
            'text'   => $note->text
        ));

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



    protected function _generateTitleFromText($text) {
        $lastSpace = strrpos(substr($text, 0, 64), ' ');
        $title = substr($text, 0, $lastSpace);

        return $title;
    }

}

?>
