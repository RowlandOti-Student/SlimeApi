<?php 

namespace Services\Sponsor;

use Repositories\Sponsor\ISponsorRepository;
use Validator;
use Helpers\Response\MyResponse;
use Services\ABaseService;

/**
* Our EventService, containing all useful methods for business logic around Event
*/
class SponsorService extends ABaseService implements ISponsorService
{
    // Containing our repositoryClassInstance to make all our database calls to
    protected $repositoryClassInstance;
    
    /**
    * Loads our $repositoryClassInstance with the actual Repo associated with our IEventRepository
    * 
    * @param IEventRepository $eventRepository
    * 
    */
    public function __construct(ISponsorRepository $sponsorRepository)
    {
        $this->repositoryClassInstance = $sponsorRepository;

        parent::__construct($sponsorRepository);
    } 

}