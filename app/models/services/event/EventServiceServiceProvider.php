<?php 

namespace Services\Event;

use Illuminate\Support\ServiceProvider;
use Repositories\Event\EventRepository;
use Repositories\Category\CategoryRepository;
use Repositories\Sponsor\SponsorRepository;
use Entities\Event\Event;
use Entities\Category\Category;
use Entities\Sponsor\Sponsor;

/**
* Register our eventservice service with Laravel
*/
class EventServiceServiceProvider extends ServiceProvider 
{
    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register() {

        // Bind the returned class to the namespace 'Services\Event\IEventService'
        $this->app->bind('Services\Event\IEventService', function($app)
        {
            return new EventService(new EventRepository(new Event()), new CategoryRepository(new Category()), new SponsorRepository(new Sponsor()));
        });

    }
}