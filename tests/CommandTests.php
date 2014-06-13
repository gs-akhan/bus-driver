<?php

use Firemango\BusDriver\Command\ICommandable;
use Firemango\BusDriver\Command\CommandTranslator;

class CommandTests extends \PHPUnit_Framework_TestCase {

    public function testCommandTranslatorReturnsCommandHandler()
    {
        $handler = (new CommandTranslator())->getHandler(new ExampleTranslatorCommand());
        $this->assertInstanceOf($handler, new ExampleTranslatorCommandHandler());
    }

    public function testCommandTranslatorThrowsErrorOnFail()
    {
        $this->setExpectedException("Firemango\BusDriver\Command\HandlerNotFoundException");
        (new CommandTranslator())->getHandler(new ExampleCommand());
    }
}

class ExampleTranslatorCommand {

}

class ExampleTranslatorCommandHandler {

}