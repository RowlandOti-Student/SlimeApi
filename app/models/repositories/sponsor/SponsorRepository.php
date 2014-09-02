<?php  

 namespace Repositories\Sponsor;

 use Eloquent;
 use Helpers\Response\MyResponse;
 use Repositories\ABaseRepository;

 class SponsorRepository extends ABaseRepository implements ISponsorRepository {

 	protected $modelClassInstance;

 	public function __construct(Eloquent $sponsorModel)
    {
        $this->modelClassInstance = $sponsorModel;

        parent::__construct($sponsorModel);
    }
  }
