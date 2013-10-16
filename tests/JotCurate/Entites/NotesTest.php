<?php

use JotContent\DataSources\PdoDataSource;
use JotCurate\Entities\Notes;

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
        $this->assertTrue(is_string(Notes::$models['notes']['INSERT']));
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

}

?>
