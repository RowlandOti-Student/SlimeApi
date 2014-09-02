<?php  

 namespace Repositories\Category;

 use Eloquent;
 use Helpers\Response\MyResponse;
 use Repositories\ABaseRepository;

 class CategoryRepository extends ABaseRepository implements ICategoryRepository {

  protected $modelClassInstance;

 	public function __construct(Eloquent $categoryModel)
    {
        $this->modelClassInstance = $categoryModel;

        parent::__construct($categoryModel);
    }
  }
