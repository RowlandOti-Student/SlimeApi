<?php  

namespace Repositories\Category;

use Illuminate\Support\ServiceProvider;
use Repositories\Category\CategoryRepository;
use Entities\Category\Category;

/**
* Register our Repository with Laravel
*/
class CategoryServiceProvider extends ServiceProvider {

	 public function register() {

	 	// Bind the returned class to the namespace interface
  		$this->app->bind('Repositories\Category\ICategoryRepository', function($app)
        {
            return new CategoryRepository(new Category());
        });

  	}

  }