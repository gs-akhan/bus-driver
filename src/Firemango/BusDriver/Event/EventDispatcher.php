<?php namespace Firemango\BusDriver\Event;

use Illuminate\Events\Dispatcher;

class EventDispatcher {

    protected $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function dispatch(array $events)
    {
        foreach($events as $event) {
            $eventName = $this->getEventName($event);
            $this->dispatcher->fire($eventName, $event);

            \Log::info("Event was logged. {$eventName}");
        }
    }

    protected function getEventName($event)
    {
        return str_replace("\\", ".", get_class($event));
    }
}