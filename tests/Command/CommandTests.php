<?php

use Firemango\BusDriver\Command\CommandTranslator;

class CommandTests extends WorkbenchTestCase {

    public function testCommandTranslatorReturnsCommandHandler()
    {
        $handler = (new CommandTranslator())->getHandler(new TaskDoneCommand());
        $this->assertInstanceOf($handler, new TaskDoneCommandHandler());
    }

    public function testCommandTranslatorThrowsErrorOnFail()
    {
        $this->setExpectedException("Firemango\BusDriver\Command\HandlerNotFoundException");
        (new CommandTranslator())->getHandler(new \stdClass());
    }
}