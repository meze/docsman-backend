<?php
declare(strict_types = 1);
namespace Tests\Docsman\Model;

use Docsman\Model\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testSetsPasswordAndEmail()
    {
        $user = new User('test@email.com', 'encpwd');

        $this->assertEquals('test@email.com', $user->getEmail());
        $this->assertEquals('encpwd', $user->getPassword());
    }

    public function testIsActive()
    {
        $user = new User('test@email.com', 'encpwd');

        $this->assertTrue($user->IsActive());
    }

    public function testHasDefaultUserRole()
    {
        $user = new User('test@email.com', 'encpwd');

        $this->assertEquals(['ROLE_USER'], $user->getRoles());
    }
}
