<?php
declare(strict_types = 1);
namespace Tests\Docsman\Model;

use Docsman\Model\Project;

class ProjectTest extends \PHPUnit_Framework_TestCase
{
    public function testRenamesProject()
    {
        $project = new Project('Old name');
        $project->rename('New name');

        $this->assertEquals('New name', $project->getName());
    }

    public function testRenamesToDefaultName()
    {
        $project = new Project('Old name');
        $project->rename('');

        $this->assertEquals(Project::DEFAULT_NAME, $project->getName());
    }
}
