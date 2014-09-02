<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("users", function(Blueprint $table) {
        $table->increments("id");
        $table->string("username");
        $table->string("phone");
        $table->string("password");
        $table->string("email");
        $table->string("api_token")->nullable();
        $table->string("remember_token")->nullable();
        $table->timestamps();
    });
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("users");
	}

}
