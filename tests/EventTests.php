<?php

use Firemango\BusDriver\Event\EventGenerator;
use Firemango\BusDriver\Event\EventDispatcher;

class EventTests extends WorkbenchTestCase {

    private $entity;

    public function setUp()
    {
        parent::setUp();
        $this->entity = new EntityObject();
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testAddEventToQueue()
    {
        $event = new TaskDoneCommand(new \stdClass());
        $this->entity->raise($event);

        $this->assertEquals($this->entity->release()[0], $event);
    }

    public function testAddEventQueueIsClearedAfterReleasing()
    {
        $event = new EventDone($this->entity);
        $this->entity->raise($event);

        $this->entity->release();

        $this->assertEquals(count($this->entity->release()), 0);
    }

    public function testEventDispatcherCanDispatchEvents()
    {
        $mock = Mockery::mock("Illuminate\Events\Dispatcher")
                        ->shouldReceive("fire")
                        ->once()
                        ->getMock();

        $this->entity->iAmDone(new EventDone($this->entity));

        $dispatcher = new EventDispatcher($mock);
        $dispatcher->dispatch($this->entity->release());
    }

}

/*** Mocks ***/

class EntityObject {
    use EventGenerator;

    public function iAmDone($eventObject)
    {
        $this->raise($eventObject);
    }
}

class EventDone {
    public function __construct(EntityObject $entityObject)
    {

    }
}