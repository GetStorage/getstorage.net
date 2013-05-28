<?php

use Illuminate\Database\Migrations\Migration;

class ImproveCfs extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('cfs', function ($table) {
            $table->enum('type', array('file', 'folder', 'link'))->after('name');
            $table->string('mime')->nullable();

            $table->renameColumn('s3', 'cloud');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // GOtta figure out the reverse
    }

}