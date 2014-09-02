<?php 

namespace Services\Category;

use Illuminate\Support\ServiceProvider;
use Repositories\Category\CategoryRepository;
use Entities\Category\Category;

/**
* Register our categoryservice service with Laravel
*/
class CategoryServiceServiceProvider extends ServiceProvider 
{
    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register() {

        // Bind the returned class to the namespace interface
        $this->app->bind('Services\Category\ICategoryService', function($app)
        {
            return new CategoryService(new CategoryRepository(new Category()));
        });

    }
}