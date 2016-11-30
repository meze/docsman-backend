<?php
declare(strict_types = 1);
namespace Tests\Docsman\Model;

use Docsman\Model\Document;
use Docsman\Model\Project;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testRenamesDocument()
    {
        $document = new Document(new Project('name'), 'Old name');
        $document->rename('New name');

        $this->assertEquals('New name', $document->getName());
    }

    public function testRenamesToDefaultName()
    {
        $document = new Document(new Project('name'), 'Old name');
        $document->rename('');

        $this->assertEquals(Document::DEFAULT_NAME, $document->getName());
    }

    public function testMarksAsTrash()
    {
        $document = new Document(new Project('name'), 'Old name');
        $document->trash();

        $this->assertTrue($document->isTrash());
    }

    public function testDocumentIsNotTrash()
    {
        $document = new Document(new Project('name'), 'Old name');

        $this->assertFalse($document->isTrash());
    }
}
