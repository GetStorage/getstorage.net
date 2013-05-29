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
        Schema::table('cfs', function ($table) {
            $table->enum('type', array('file', 'folder', 'link'))->after('name');

            $table->renameColumn('s3', 'cloud');
        });


        DB::statement('ALTER TABLE `cfs` ALTER `mime` DROP DEFAULT;');
        DB::statement('ALTER TABLE `cfs` CHANGE COLUMN `mime` `mime` VARCHAR(255) NULL COLLATE \'utf8_unicode_ci\' AFTER `folder`;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cfs', function ($table) {
            $table->dropColumn('type');

            $table->renameColumn('cloud', 's3');
        });

        DB::statement('ALTER TABLE `cfs` ALTER `mime` DROP DEFAULT;');
        DB::statement('ALTER TABLE `cfs` CHANGE COLUMN `mime` `mime` VARCHAR(255) NOT NULL COLLATE \'utf8_unicode_ci\' AFTER `folder`;');
    }

}
