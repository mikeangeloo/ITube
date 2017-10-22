<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects_content', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projects_id')->nullable()->index('fk_projects_content_projects');
			$table->integer('tubes_id')->nullable()->index('fk_projects_content_tubes');
			$table->integer('tubes_amount')->unsigned()->nullable();
			$table->integer('trays_id')->nullable()->index('fk_projects_content_trays');
			$table->integer('trays_amount')->unsigned()->nullable();
			$table->integer('gutters_id')->nullable()->index('fk_projects_content_gutters');
			$table->integer('gutters_amount')->unsigned()->nullable();
			$table->integer('cables_id')->nullable()->index('fk_projects_content_cables');
			$table->integer('cables_amount')->unsigned()->nullable();
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
		Schema::drop('projects_content');
	}

}
