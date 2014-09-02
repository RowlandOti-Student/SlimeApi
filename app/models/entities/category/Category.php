<?php

namespace Entities\Category;

use Entities\BaseModel;

class Category extends BaseModel
{
	//Our models’ $table property should match what’s specified in the migrations and seeders.
    protected $table = "category";
 
    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];

    public static $rules = array(
        "name" => "required",
        "description" => "required|min:10"
        );

    public function events()
    {
    	//we’ve gone with a belongsToMany() relationship to connect the entities together. 
        //The arguments for each of these is (1) the model name, (2) the pivot table name, (3) the local key and (4) the foreign key.
        return $this->belongsToMany("Entities\Event\Event", "category_event", "category_id", "event_id");
    }
}