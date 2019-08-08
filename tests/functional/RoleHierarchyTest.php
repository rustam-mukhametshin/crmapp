<?php

class RoleHierarchyTest extends \Codeception\Test\Unit
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {

    }

    public function DefaultRoleIsGuest()
    {
        // no login at all
        $this->assertFalse($this->user->can('admin'));
        $this->assertFalse($this->user->can('manager'));
        $this->assertFalse($this->user->can('user'));
        $this->assertTrue($this->user->can('guest'));
    }
}