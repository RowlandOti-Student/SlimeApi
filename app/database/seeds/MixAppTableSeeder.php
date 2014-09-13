<?php

use Entities\Event\Event;
use Entities\Sponsor\Sponsor;
use Entities\Category\Category;

class MixAppTableSeeder extends Seeder {

public function run() {

		// clear our database ------------------------------------------
		//DB::table('event')->delete();
		//DB::table('sponsor')->delete();
		//DB::table('category')->delete();
		//DB::table('category_event')->delete();
		//DB::table('event_sponsor')->delete();

		// seed our events table -----------------------
		// we'll create three different events

		// event 1 is named Lawly. She is extremely dangerous. Especially when hungry.
		$eventLawly = Event::create(array(
			'name'         => 'Pivot East Pitch',
			'description'  => 'Ideas will get turned into real investments',
			'started_at' => date("Y-m-d H:i:s"),
			'ended_at'   => date("Y-m-d H:i:s")
		));

		// event 2 is named Cerms. He has a loud growl but is pretty much harmless.
		$eventCerms = Event::create(array(
			'name'         => 'Matter Heart Run',
			'description'  => 'Let us run to give our kids health',
			'started_at' => date("Y-m-d H:i:s"),
			'ended_at'   => date("Y-m-d H:i:s")
		));

		// event 3 is named Adobot. He is a polar bear. He drinks vodka.
		$eventAdobot = Event::create(array(
			'name'         => 'Harvest Festival',
			'description'  => 'On this day we will all remember',
			'started_at' => date("Y-m-d H:i:s"),
			'ended_at'   => date("Y-m-d H:i:s")
		));

		$this->command->info('> The events are alive!');

		// seed our sponsors table ---------------------

		// we will create one sponsor and apply all bears to this one sponsor
		$sponsorYellowstone = Sponsor::create(array(
			 'name'        =>  'Tuzo Kenya',
             'description' => 'The best milk in East Africa.',
             'url'         => 'http://www.tuzo.com'
             
		));
		$sponsorGrandCanyon = Sponsor::create(array(
			 'name'        =>  'United Mall',
             'description' => 'Unga kwa bei nafuu.',
             'url'         => 'http://www.unitedmall.com'
             
		));
		
		// link our bears to picnics ---------------------
		// for our purposes we'll just add all bears to both picnics for our many to many relationship
		$eventLawly->sponsors()->attach($sponsorYellowstone->id);
		$eventLawly->sponsors()->attach($sponsorGrandCanyon->id);

		$eventCerms->sponsors()->attach($sponsorYellowstone->id);
		$eventCerms->sponsors()->attach($sponsorGrandCanyon->id);

		$eventAdobot->sponsors()->attach($sponsorYellowstone->id);
		$eventAdobot->sponsors()->attach($sponsorGrandCanyon->id);

		$this->command->info('> The events are enjoying sponsorship!');


		// seed our categories table ---------------------

		// we will create one picnic and apply all bears to this one picnic
		$categoryYellowstone = Category::create(array(
			 'name'        =>  'Worship',
             'description' => 'Our God is the best'
             
		));
		$categoryGrandCanyon = Category::create(array(
			 'name'        =>  'Sports',
             'description' => 'Healthy sweat is good'
             
		));
		
		// link our bears to categories ---------------------
		// for our purposes we'll just add all bears to both categories for our many to many relationship
		$eventLawly->categories()->attach($categoryYellowstone->id);
		$eventLawly->categories()->attach($categoryGrandCanyon->id);

		$eventCerms->categories()->attach($categoryYellowstone->id);
		$eventCerms->categories()->attach($categoryGrandCanyon->id);

		$eventAdobot->categories()->attach($categoryYellowstone->id);
		$eventAdobot->categories()->attach($categoryGrandCanyon->id);

		$this->command->info('> The events are in different categories!');

	}

}
