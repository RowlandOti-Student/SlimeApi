<?php

use Services\Event\IEventService;

class EventController extends ApiBaseController {

    protected $modelService;

    public function __construct(IEventService $eventService)
    {
        $this->modelService = $eventService;

        parent::__construct($eventService);
    }

	
}