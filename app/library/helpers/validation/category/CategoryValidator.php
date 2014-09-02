<?php 

 namespace Helpers\Validation\Category;

 use Helpers\Validation\IMyValidator;
 use Helpers\Validation\AMyLaravelValidator;
 
class CategoryValidator extends AMyLaravelValidator implements IMyValidator {
 
  /**
   * Validation for creating a new User
   *
   * @var array
   */
  protected $rules = array(
    "name" => "required",
    "description" => "required|min:10"
    );
}