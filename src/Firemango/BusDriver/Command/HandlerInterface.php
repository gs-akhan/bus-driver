<?php namespace Firemango\BusDriver\Command;

interface HandlerInterface {
    function handle($command);
}