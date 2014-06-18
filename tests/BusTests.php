<?php

use Firemango\BusDriver\Command\HandlerInterface;
use Firemango\BusDriver\Event\EventGenerator;
use Firemango\BusDriver;

class BusTests extends WorkbenchTestCase {

    protected $taskDoneCommand;
    protected $busdriver;
    protected $application;

    public function setUp()
    {
        parent::setUp();

        $this->busdriver = \App::make('Firemango\BusDriver\BusDriver');
    }

    public function testBusDriverTransportsCommandObject()
    {
        $this->assertEquals("test", $this->busdriver->transport(new TaskDoneCommand()));
    }

}

class TaskDoneCommand {

}

class TaskDoneCommandHandler implements HandlerInterface {

    function handle($command)
    {
        return "test";
    }
}