<?php 

namespace Services\Event;

use Helpers\Validation\Event\EventValidator;
use Helpers\Validation\Sponsor\SponsorValidator;
use Helpers\Validation\Category\CategoryValidator;
use Repositories\Event\IEventRepository;
use Repositories\Category\ICategoryRepository;
use Repositories\Sponsor\ISponsorRepository;
use Helpers\Response\MyResponse;
use Services\ABaseService;
use App;
use DB;

/**
* Our EventService, containing all useful methods for business logic around Event
*/
class EventService extends ABaseService implements IEventService
{
    // Containing our repositories to make all our database calls .
    protected $categoryRepository;
    protected $sponsorRepository;
    /**
    * Loads our $repository with the actual Repo associated with our IEventRepository
    * 
    * @param IEventRepository $eventRepository
    * @param ICategoryRepository $categoryRepository
    * @param ISponsorRepository $sponsorRepository
    */
    public function __construct(IEventRepository $eventRepository, ICategoryRepository $categoryRepository, ISponsorRepository $sponsorRepository)
    {
        $this->sponsorRepository = $sponsorRepository;
        $this->categoryRepository = $categoryRepository;
        //$this->repository is inherited
        $this->repository = $eventRepository;

        parent::__construct($eventRepository);
    } 

    public function create(array $input) 
    {
        $eventData    = $input['event'];
        $sponsorData  = $input['sponsors'];
        $categoryData = $input['category'];

        $eventValidator = new EventValidator( App::make('validator'));
        $eventValidator->with($eventData);

        if($eventValidator->passes()) 
        {
            // Start transaction!
            DB::beginTransaction();
            //Create the new event record and return the model
            $eventModel = $this->repository->create($eventData);
            //$event = parent::create($eventData);

            $sponsorValidator = new SponsorValidator( App::make('validator'));

            foreach($sponsorData as $sponsor)
                {
                    $sponsorValidator->with($sponsor);

                    if($sponsorValidator->passes()) 
                    {
                        //Create the new sponsor records and associate them with the event record
                        $sponsorModel = $this->sponsorRepository->create($sponsor);
                        $eventModel->sponsors()->save($sponsorModel);
                    }
                    else 
                    {
                        $status = 200;

                        $data = array(
                            'status'  => $status,
                            'success' => false,
                            'message' => $sponsorValidator->errors()->toArray()
                            );

                        $response = MyResponse::json($data, $status);
                        //Roll back transactions
                        DB::rollback();

                        return $response;
                    }
                }

            $categoryValidator = new CategoryValidator( App::make('validator'));
            $categoryValidator->with($categoryData);

            if($categoryValidator->passes()) 
            {
                //Create the category record and associate it with the event record
                $categoryModel = $this->categoryRepository->create( $categoryData);
                $categoryModel->events()->save($eventModel);
            }
            else 
            {
                $status = 200;

                $data = array(
                    'status'  => $status,
                    'success' => false,
                    'message' => $categoryValidator->errors()->toArray()
                );

                $response = MyResponse::json($data, $status);
                //Roll back transactions
                DB::rollback();

                return $response;
            }
        }
        else 
        {

            $status = 200;

            $data = array(
                'status'  => $status,
                'success' => false,
                'message' => $eventValidator->errors()->toArray()
                );

            $response = MyResponse::json($data, $status);
            //Roll back transactions
            DB::rollback();

            return $response;
        }

        
        $status = 201;

        $data = array(
            'status'  => $status,
            'success' => true,
            'message' => 'Event successfully created'
            );

        $response = MyResponse::json($data, $status);
        // If we reach here, then data is valid and working. Commit the queries!
        DB::commit();

        return $response;

    }

}