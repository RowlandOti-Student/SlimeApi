<?php

use Services\Sponsor\ISponsorService;

class SponsorController extends ApiBaseController {

	protected $modelService;

    public function __construct(ISponsorService $sponsorService)
    {
        $this->modelService = $sponsorService;

        parent::__construct($sponsorService);
    }


}