<?php 

namespace Services\Sponsor;

use Illuminate\Support\ServiceProvider;
use Repositories\Sponsor\SponsorRepository;
use Entities\Sponsor\Sponsor;

/**
* Register our eventservice service with Laravel
*/
class SponsorServiceServiceProvider extends ServiceProvider 
{
    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register() {

        // Bind the returned class to the namespace interface
        $this->app->bind('Services\Sponsor\ISponsorService', function($app)
        {
            return new SponsorService(new SponsorRepository(new Sponsor()));
        });

    }
}