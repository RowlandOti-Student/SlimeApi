<?php  

namespace Repositories\Event;

use Illuminate\Support\ServiceProvider;
use Repositories\Event\EventRepository;
use Entities\Event\Event;

/**
* Register our Repository with Laravel
*/
class EventServiceProvider extends ServiceProvider {

	 public function register() {

	 	// Bind the returned class to the namespace 'Repository\Event\IEventRepository'
  		$this->app->bind('Repositories\Event\IEventRepository', function($app)
        {
            return new EventRepository(new Event());
        });

  	}

  }