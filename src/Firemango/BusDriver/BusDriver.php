<?php namespace Firemango\BusDriver;

use Firemango\BusDriver\Command\CommandTranslator;

class BusDriver {

    private $commandTranslator;

    public function __construct(CommandTranslator $translator)
    {
        $this->commandTranslator = $translator;
    }

    /**
     * Transport
     *
     * Starts the command chain and returns the result.
     *
     * @param $command
     */

    public function transport($command)
    {
        $handler = $this->commandTranslator->getHandler($command);
        return \App::make($handler)->handle($command);
    }

}