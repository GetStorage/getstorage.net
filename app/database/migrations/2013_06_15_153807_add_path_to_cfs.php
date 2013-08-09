<?php

use Illuminate\Database\Migrations\Migration;

class AddPathToCfs extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cfs_files', function($table) {
            $table->string('path', 255)->index();
        });
        Schema::table('cfs_folders', function($table) {
            $table->string('path', 255)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cfs_files', function($table) {
            $table->dropColumn('path');
        });
        Schema::table('cfs_folders', function($table) {
            $table->dropColumn('path');
        });
    }

}