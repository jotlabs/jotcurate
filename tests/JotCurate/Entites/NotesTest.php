<?php

use JotContent\DataSources\PdoDataSource;
use JotCurate\Entities\Notes;
use JotCurate\Models\Note;

class NotesTest extends PHPUnit_Framework_TestCase {
    protected $notes;

    public function setUp() {
        $dsn = UnitTestUtils::createDsn();
        $this->notes = Notes::getInstance();
        $this->notes->setDataSource(new PdoDataSource($dsn));
    }

    public function testClassExists() {
        $this->assertTrue(class_exists('JotCurate\Entities\Notes'));
        $this->assertNotNull($this->notes);
        $this->assertTrue(is_a($this->notes, 'JotCurate\Entities\Notes'));
        $this->assertTrue(is_a($this->notes, 'JotContent\Entity'));
    }

    public function testStaticModelsExist() {
        $this->assertTrue(is_array(Notes::$models));
        $this->assertTrue(is_array(Notes::$models['notes']));
        $this->assertTrue(is_string(Notes::$models['notes']['insert']));
    }

    public function testGetBySlug() {
        $note = $this->notes->getBySlug('unit-test-note');
        $this->assertNotNull($note);
        $this->assertTrue(!empty($note));
        $this->assertTrue(is_a($note, 'JotCurate\Models\Note'));
        $this->assertTrue(is_a($note, 'JotContent\Model'));

        $this->assertEquals(1, $note->getPrimaryKey());
        $this->assertEquals('Unit Test note', $note->title);
        $this->assertEquals('unit-test-note', $note->slug);
        $this->assertEquals('This is a note for a unit test.', $note->text);
        $this->assertEquals('2013-10-16 07:44:00', $note->dateAdded);
    }


    public function testInsertNewNote() {
        $note = new Note();
        $testNote = array(
            'title' => 'Newly added note',
            'slug'  => 'newly-added-note',
            'text'  => 'This is a newly added Note!'
        );

        $note->title = $testNote['title'];
        $note->text  = $testNote['text'];

        $addedNote = $this->notes->addNote($note);
        $this->assertNotNull($addedNote);
        $this->assertTrue(is_a($addedNote, 'JotCurate\Models\Note'));

        $this->assertEquals(2, $addedNote->getPrimaryKey());
        $this->assertEquals($testNote['title'], $addedNote->title);
        $this->assertEquals($testNote['text'],  $addedNote->text);
        $this->assertEquals($testNote['slug'],  $addedNote->slug);
        $this->assertNotNull($addedNote->dateAdded);
    }

    public function testInsertDuplicateNote() {
        $note = new Note();
        $testNote = array(
            'title' => 'Newly added note',
            'slug'  => 'newly-added-note',
            'text'  => 'This is a newly added Note!'
        );

        $note->title = $testNote['title'];
        $note->text  = $testNote['text'];

        $addedNote = $this->notes->addNote($note);
        $this->assertNotNull($addedNote);
        $this->assertTrue(is_a($addedNote, 'JotCurate\Models\Note'));

        $this->assertEquals(2, $addedNote->getPrimaryKey());

        $addedNote2 = $this->notes->addNote($note);
        $this->assertFalse($addedNote2);
    }

}

?>
