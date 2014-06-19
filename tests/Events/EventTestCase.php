<?php

use Firemango\BusDriver\Event\EventListener;
use Firemango\BusDriver\Event\EventGenerator;

class EventTestCase extends WorkbenchTestCase {

    protected $entity;
    protected $event;

    public function setUp()
    {
        parent::setUp();
        $this->entity = new EntityObject();
        $this->event = new EventDone($this->entity);
    }

    public function tearDown()
    {
        $this->entity = null;
        $this->event = null;

        Mockery::close();
    }

    public function testInstances()
    {
        $this->assertInstanceOf("EntityObject", $this->entity);
        $this->assertInstanceOf("EventDone", $this->event);
    }
}

class EntityObject {
    use EventGenerator;
}

class EventDone { }

class Listener extends EventListener {
    public function whenEventDone(EventDone $event) { }

}
