<?php namespace Firemango\BusDriver\Event;

class EventListener {

    public function handle($event)
    {
        $method = $this->getMethodName($event);

        if (method_exists($this, $method))
        {
            return $this->$method($event);
        }
    }

    public function getMethodName($event)
    {
        return 'when' . (new \ReflectionClass($event))->getShortName();
    }

}