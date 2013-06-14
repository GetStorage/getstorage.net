<?php

use Illuminate\Database\Migrations\Migration;

class CfsFixes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cfs_folders', function($table) {
            $table->unique(array('name', 'parent_id', 'user_id'));
        });

        Schema::table('cfs_files', function($table) {
            $table->unique(array('name', 'folder_id', 'user_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cfs_folders', function($table) {
            $table->dropUnique('cfs_folders_name_parent_id_user_id_unique');
        });

        Schema::table('cfs_files', function($table) {
            $table->dropUnique('cfs_files_name_folder_id_user_id_unique');
        });
    }

}