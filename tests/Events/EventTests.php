<?php

use Firemango\BusDriver\Event\EventGenerator;
use Firemango\BusDriver\Event\EventDispatcher;

class EventTests extends EventTestCase {

    public function testAddEventToQueue()
    {
        $this->entity->raise($this->event);
        $this->assertEquals($this->entity->release()[0], $this->event);
    }

    public function testAddEventQueueIsClearedAfterReleasing()
    {
        $this->entity->raise($this->event);
        $this->entity->release();

        $this->assertEquals(count($this->entity->release()), 0);
    }

    public function testEventDispatcherCanDispatchEvents()
    {
        $mock = Mockery::mock("Illuminate\Events\Dispatcher")
                        ->shouldReceive("fire")
                        ->once()
                        ->getMock();

        $this->entity->raise(new EventDone($this->entity));

        $dispatcher = new EventDispatcher($mock);
        $dispatcher->dispatch($this->entity->release());
    }

    public function testEventListenerIsFired()
    {
        \Event::listen('EventDone', 'Listener');

        $this->entity->raise(new EventDone($this->entity));

        $dispatcher = App::make("Firemango\BusDriver\Event\EventDispatcher");
        $dispatcher->dispatch($this->entity->release());

        // TODO: Finish test
    }

}