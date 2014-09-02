<?php

use Helpers\Response\MyResponse;
use Helpers\Token\MyAuthToken;

class AuthController extends BaseController {

	public function postLogin() 
	{
		if ($this->isPostRequest()) 
        {

			$validator = $this->getLoginValidator();

			if ($validator->passes()) 
			{
				$credentials = $this->getLoginCredentials();

				if (Auth::attempt($credentials, true))
				{
					$api_token = Auth::user()->api_token;

					$status = 200;

					$data = array(
						'status'  => $status,
						'success' => true,
						'message' => 'Login Successful'
						);

					$headers = array(
						'X-Api-Token' => $api_token
						);

					$response  = MyResponse::json($data, $status, $headers);

					return $response;
				}
                else 
                {
                	$status = 200;

					$data = array(
						'status'  => $status,
						'success' => false,
						'message' => 'Login Unsuccessful'
						);

					$response  = MyResponse::json($data, $status);

					return $response;

                }	
			} 
			else 
			{
				$status = 200;

				$data = array(
					'status'  => $status,
					'success' => false,
					'message' => $validator->messages()->toArray()
					);

				$response  = MyResponse::json($data, $status);

				return $response;	
			}
		}

		return View::make("user/login");
	}

	public function postRegistration() {

		if ($this->isPostRequest()) 
		{

			$validator = $this->getRegistrationValidator();

			if ($validator->passes()) 
			{
				$credentials = $this->getRegistrationCredentials();

				$user = new User();
                
                //Take care, only mass assignable columns are fillable, check User model
                $user->fill($credentials);

                if($user->save()) 
                {
                    $status = 201;

                    $data = array(
                        'status'  => $status,
                        'success' => true,
                        'message' => 'User sucessfully created'
                        );

                    $response = MyResponse::json($data, $status);

                    return $response;

                } 
                else 
                {
                    $status = 200;

                    $data = array(
                        'status'  => $status,
                        'success' => false,
                        'message' => 'User unsucessfully updated'
                        );

                    $response = MyResponse::json($data, $status);

                    return $response;
                }
			}
			else 
			{
                $status = 200;

                $data = array(
                    'status'  => $status,
                    'success' => false,
                    'message' => $validator->messages()->toArray()
                    );

                $response  = MyResponse::json($data, $status);

                return $response;   
			}

		}
		else
		{

		}

	}

    protected function isPostRequest()
    {
    	return Input::server("REQUEST_METHOD") == "POST";
    }
  
    protected function getLoginValidator()
    {
    	$rules = array(
            "username" => "required",
    		"password" => "required"
        );

    	return Validator::make(Input::all(), $rules);
    }

    protected function getRegistrationValidator()
    {
    	$rules = array(
            'username' => 'required|unique:users', 
            'phone' => 'required', 
            'password' => 'required', 
            'email' => 'required|unique:users|email'
        );

    	return Validator::make(Input::all(), $rules);
    }
  
    protected function getLoginCredentials()
    {

    	$credentials = array(
            "username" => Input::get("username"),
            "password" => Input::get("password")
        );

    	return $credentials;
    }

    protected function getRegistrationCredentials()
    {

    	$credentials = array(
            "username"     => Input::get("username"),
            "phone"        => Input::get("phone"),
            "password"     => Hash::make(Input::get("password")),
            "email"        => Input::get("email"),
            "api_token"    => MyAuthToken::getToken(96)
        );
        
    	return $credentials;
    }

    
}