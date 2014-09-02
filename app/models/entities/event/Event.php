<?php

namespace Entities\Event;

use Entities\BaseModel;

class Event extends BaseModel
{
	//Our models’ $table property should match what’s specified in the migrations and seeders.
    protected $table = "event";
 
    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public static $rules = array(
        "name" => "required",
        "description" => "required|min:10",
        "started_at"  => "required",
        "ended_at"  => "required"
        );

    //we’ve gone with a belongsToMany() relationship to connect the entities together. 
    //The arguments for each of these is (1) the model name, (2) the pivot table name, (3) the local key and (4) the foreign key.
    public function categories()
    {
        return $this->belongsToMany("Entities\Category\Category", "category_event", "event_id", "category_id");
    }

    public function sponsors()
    {
        return $this->belongsToMany("Entities\Sponsor\Sponsor", "event_sponsor", "event_id", "sponsor_id");
    }

    /*
     |  There are times when we need to customise how model attributes are stored and retrieved. 
     |  Laravel 4 lets us do that by providing specially named methods for accessors and mutators:
     |
     | You can catch values, before they hit the database, by creating public set*Attribute() methods. 
     | These should transform the $value in some way and commit the change to the internal $attributes array.
     |
     |  You can also catch values, before they are returned, by creating get*Attribute() methods.
     |  In the case of these methods; I am removing all non-word characters from the name value, 
     |  before it hits the database; and trimming the description before it’s returned by the property accessor. 
     |  Getters are also called by the toArray() and toJson() methods which transform model instances into either arrays or 
     |  JSON strings.
     |
     |  You can also add attributes to models by creating accessors and mutators for them, and mentioning them in the $appends 
     |  property:
    */

    public function setNameAttribute($value)
    {
        $this->attributes["name"] = preg_replace("/\W/", "", $value);
    }

    public function getDescriptionAttribute()
    {
        return trim($this->attributes["description"]);
    }

    /*
     |  Here we’ve created two new accessors which check the count for categories and sponsors. 
     |  We’ve also added those two attributes to the $appends array so they are returned when we list (index) 
     |  all events or specific (show) events.
     |
     |  You can find out more about attribute accessor and mutators at: http://laravel.com/docs/eloquent#accessors-and-mutators.
    */

    protected $appends = ["hasCategories", "hasSponsors"];

    public function getHasCategoriesAttribute()
    {
        $hasCategories = $this->categories()->count() > 0;

        return $this->attributes["hasCategories"] = $hasCategories;
    }

    public function getHasSponsorsAttribute()
    {
        $hasSponsors = $this->sponsors()->count() > 0;
        
        return $this->attributes["hasSponsors"] = $hasSponsors;
    }
}