<?php

use Firemango\BusDriver\Command\HandlerInterface;
use Firemango\BusDriver\Event\EventGenerator;
use Firemango\BusDriver;

class BusTestCase extends WorkbenchTestCase {

    protected $busdriver;

    public function setUp()
    {
        parent::setUp();

        $this->busdriver = \App::make('Firemango\BusDriver\BusDriver');
    }

    public function tearDown()
    {
        $this->busdriver = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf("Firemango\BusDriver\BusDriver", $this->busdriver);
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
