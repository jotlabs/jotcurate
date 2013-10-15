<?php

use JotCurate\Models\Note;

class NoteTest extends PHPUnit_Framework_TestCase {
    protected $note;

    public function setUp() {
        $this->note = new Note();
    }

    public function testClassExists() {
        $this->assertTrue(class_exists('JotCurate\Models\Note'));
        $this->assertNotNull($this->note);
        $this->assertTrue(is_a($this->note, 'JotCurate\Models\Note'));
        $this->assertTrue(is_a($this->note, 'JotContent\Model'));
    }

}


?>
