<?php

use Firemango\BusDriver\BusDriver;

class BusTests extends WorkbenchTestCase {

    private $busdriver;

    public function __construct(BusDriver $busdriver)
    {
        $this->busdriver = $busdriver;
    }

    public function testBusDriverTransportsCommandObject()
    {
        $this->busdriver->transport(new ExampleCommand());
    }
}

class ExampleCommand {

}