<?php 

 namespace Helpers\Validation\Sponsor;

 use Helpers\Validation\IMyValidator;
 use Helpers\Validation\AMyLaravelValidator;
 
class SponsorValidator extends AMyLaravelValidator implements IMyValidator {
 
  /**
   * Validation for creating a new User
   *
   * @var array
   */
  protected $rules = array(
    "name" => "required",
    "description" => "required|min:10",
    "url" => "required"
    );
}