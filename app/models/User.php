<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Entities\BaseModel;

class User extends BaseModel implements UserInterface, RemindableInterface
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    
    /** 
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array(

<<<<<<< HEAD
        'password');
    
    protected $fillable = array(

        'username', 
        'phone', 
        'password', 
        'email',
        'api_token');
     
    
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
    
    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }
    
    public function getRememberToken()
    {
        
        return $this->remember_token;
        
    }
    
    public function setRememberToken($value)
    {
        
        $this->remember_token = $value;
        
    }
    
    public function getRememberTokenName()
    {
        
        return "remember_token";
        
    }

    /**
     * User following relationship
     *
     * we’ve gone with a belongsToMany() relationship to connect the entities together. 
     * The arguments for each of these is (1) the model name, (2) the pivot table name, 
     *(3) the local key and (4) the foreign key.
     */
    public function following()
    {
        return $this->belongsToMany('User', 'user_follows', 'user_id', 'follow_id');
    }

    /**
     * User followers relationship
     */
    public function followers()
    {
        return $this->belongsToMany('User', 'user_follows', 'follow_id', 'user_id');
    }
}
=======
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
>>>>>>> laravel/master
