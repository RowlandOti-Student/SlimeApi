<?php 

namespace Services\Category;

use Repositories\Category\ICategoryRepository;
use Validator;
use Helpers\Response\MyResponse;
use Services\ABaseService;

/**
* Our CategoryService, containing all useful methods for business logic around Category
*/
class CategoryService extends ABaseService implements ICategoryService
{
    // Containing our repositoryClassInstance to make all our database calls to
    protected $repositoryClassInstance;
    
    /**
    * Loads our $repositoryClassInstance with the actual Repo associated with our ICategoryRepository
    * 
    * @param ICategoryRepository $categoryRepository
    * 
    */
    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->repositoryClassInstance = $categoryRepository;

        parent::__construct($categoryRepository);
    } 

}