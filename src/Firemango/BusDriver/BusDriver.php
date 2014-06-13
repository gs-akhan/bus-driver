<?php namespace Firemango\BusDriver;

use Illuminate\Foundation\Application;
use Firemango\BusDriver\Command\CommandTranslator;

class BusDriver {

    private $commandTranslator;
    private $application;

    public function __construct(Application $application, CommandTranslator $translator)
    {
        $this->commandTranslator = $translator;
        $this->application = $application;
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

        return $this->application->make($handler)->handle($command);
    }

}