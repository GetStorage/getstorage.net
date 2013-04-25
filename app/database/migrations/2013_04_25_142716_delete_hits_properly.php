<?php

use Illuminate\Database\Migrations\Migration;

class DeleteHitsProperly extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('object_hits', function($table) {
            $table->dropForeign('object_hits_object_id_foreign');

            $table->foreign('object_id')->references('id')->on('objects')->on_delete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
