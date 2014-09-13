<?php  

 namespace Repositories\Event;

 use Eloquent;
 use Helpers\Response\MyResponse;
 use Repositories\ABaseRepository;

 class EventRepository extends ABaseRepository implements IEventRepository {

  protected $modelClassInstance;

 	public function __construct(Eloquent $eventModel)
    {
        $this->modelClassInstance = $eventModel;

        parent::__construct($eventModel);
    }
  }
