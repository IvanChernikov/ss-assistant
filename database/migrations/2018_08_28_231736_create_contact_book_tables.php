<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactBookTables extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('cb_people', function (Blueprint $table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->date('date_of_birth');
		});
		Schema::create('cb_addresses', function (Blueprint $table) {
			$table->increments('id');
			$table->string('street');
			$table->string('city');
			$table->string('state_province')->nullable();
			$table->string('country');
			$table->string('zip_postal');
			
			$table->unsignedInteger('person_id');
			$table->foreign('person_id')->on('cb_people')->references('id');
		});
		Schema::create('cb_emails', function (Blueprint $table) {
			$table->increments('id');
			$table->string('value');
			$table->string('type')->default('personal');
			
			$table->unsignedInteger('person_id');
			$table->foreign('person_id')->on('cb_people')->references('id');
		});
		Schema::create('cb_accounts', function (Blueprint $table) {
			$table->increments('id');
			$table->string('platform');
			$table->string('name');
			
			$table->unsignedInteger('person_id');
			$table->foreign('person_id')->on('cb_people')->references('id');
		});
		Schema::create('cb_phones', function (Blueprint $table) {
			$table->increments('id');
			$table->string('value');
			$table->string('type')->default('cell');
			
			$table->unsignedInteger('person_id');
			$table->foreign('person_id')->on('cb_people')->references('id');
		});
		
		// Add person relationhip to user table
		Schema::table('users', function(Blueprint $table) {
			$table->unsignedInteger('person_id');
			$table->foreign('person_id')->on('cb_people')->references('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
	}
}