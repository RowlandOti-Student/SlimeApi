<?php 

 namespace Helpers\Validation;

 use Illuminate\Validation\Factory;
 use Helpers\Validation\IMyValidator;
 use Helpers\Validation\AMyValidator;
 
 abstract class AMyLaravelValidator extends AMyValidator {


 /**
   * Validator
   *
   * @var Illuminate\Validation\Factory
   */
  protected $validator;
 
  /**
   * Construct
   *
   * @param Illuminate\Validation\Factory $validator
   */
  public function __construct(Factory $validator)
  {
    $this->validator = $validator;
  }
 
  /**
   * Pass the data and the rules to the validator
   *
   * @return boolean
   */
  public function passes()
  {
    $validator = $this->validator->make($this->data, $this->rules);
 
    if( $validator->fails() )
    {
      $this->errors = $validator->messages();
      
      return false;
    }
 
    return true;
  }

 }