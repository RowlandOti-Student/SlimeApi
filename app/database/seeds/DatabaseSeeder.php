<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement("SET foreign_key_checks = 0");
		Eloquent::unguard();

		
		//$this->call('SponsorTableSeeder');
		//$this->call('CategoryTableSeeder');
		$this->call('MixAppTableSeeder');
		$this->call('UsersTableSeeder');

        //show information in the command line after everything is run
		$this->command->info('> Slime app  DB seeds finished.'); 
	}

}