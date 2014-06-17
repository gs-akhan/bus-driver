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
        $this->busdriver->transport(new TaskDoneCommand());
    }

}

class TaskDoneCommand {

}

class TaskDoneCommandHandler implements HandlerInterface {

    use EventGenerator;

    function handle($command)
    {

    }
}