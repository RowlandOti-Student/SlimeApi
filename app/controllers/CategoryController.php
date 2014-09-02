<?php

use Services\Category\ICategoryService;

class CategoryController extends ApiBaseController {

	protected $modelService;

    public function __construct(ICategoryService $categoryService)
    {
        $this->modelService = $categoryService;

        parent::__construct($categoryService);
    }
}