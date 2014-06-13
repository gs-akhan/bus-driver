<?php

use Firemango\BusDriver\BusDriver;
use Firemango\BusDriver\Command\ICommandable;

class BusTests extends \PHPUnit_Framework_TestCase {

    public function testBusDriverTransportsCommandObject()
    {
        $busdriver = new BusDriver();
        $busdriver->transport(new ExampleCommand());
    }
}

class ExampleCommand {

}