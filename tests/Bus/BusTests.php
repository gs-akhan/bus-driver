<?php

use Firemango\BusDriver\Event\EventGenerator;
use Firemango\BusDriver;

class BusTests extends BusTestCase {

    public function testBusDriverTransportsCommandObject()
    {
        $this->assertEquals("test", $this->busdriver->transport(new TaskDoneCommand()));
    }

}