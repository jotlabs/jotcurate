<?php
namespace JotCurate\Models;

use JotContent\Model;

class Note extends Model {

    protected $_id;

    public $title;
    public $slug;
    public $text;
    public $dateAdded;

}

?>
