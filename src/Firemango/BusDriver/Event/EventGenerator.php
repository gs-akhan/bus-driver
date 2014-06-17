<?php namespace Firemango\BusDriver\Event;

trait EventGenerator {

    protected $eventsQueue = [];

    public function raise($event)
    {
        $this->eventsQueue[] = $event;
    }

    public function release()
    {
        $events = $this->eventsQueue;

        $this->eventsQueue = [];

        return $events;
    }

}