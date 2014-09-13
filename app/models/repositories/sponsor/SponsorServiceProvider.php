<?php  

namespace Repositories\Sponsor;

use Illuminate\Support\ServiceProvider;
use Repositories\Sponsor\SponsorRepository;
use Entities\Sponsor\Sponsor;

/**
* Register our Repository with Laravel
*/
class SponsorServiceProvider extends ServiceProvider {

	 public function register() {

	 	// Bind the returned class to the namespace interface
  		$this->app->bind('Repositories\Sponsor\ISponsorRepository', function($app)
        {
            return new SponsorRepository(new Sponsor());
        });

  	}

  }