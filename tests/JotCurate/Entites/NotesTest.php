<?php

use JotContent\DataSources\PdoDataSource;
use JotCurate\Entities\Notes;

class NotesTest extends PHPUnit_Framework_TestCase {
    protected $notes;
    //protected $dsn = 'sqlite:{DB_PATH}jotcurate.db';

    public function setUp() {
        //$dsn = preg_replace('/\{DB_PATH\}/', UNITTEST_DB_PATH, $this->dsn);
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

    public function testDataSource() {
    }

    public function testGetBySlug() {
        $note = $this->notes->getBySlug('unit-test-note');
        $this->assertNotNull($note);
        $this->assertTrue(!empty($note));
        $this->assertTrue(is_a($note, 'JotCurate\Models\Note'));
        $this->assertTrue(is_a($note, 'JotContent\Model'));

    }

}

?>
