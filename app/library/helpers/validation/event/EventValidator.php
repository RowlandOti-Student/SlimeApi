<?php 

 namespace Helpers\Validation\Event;

 use Helpers\Validation\IMyValidator;
 use Helpers\Validation\AMyLaravelValidator;
 
class EventValidator extends AMyLaravelValidator implements IMyValidator {
 
  /**
   * Validation for creating a new User
   *
   * @var array
   */
  protected $rules = array(
  	"name" => "required",
    "description" => "required|min:10",
    "started_at"  => "required",
    "ended_at"  => "required"
    );
 
}