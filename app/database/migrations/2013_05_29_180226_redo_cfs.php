<?php

use Illuminate\Database\Migrations\Migration;

class RedoCfs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cfs_folders', function($table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('parent_id')->references('id')->on('cfs_folders');
        });

        Schema::create('cfs_files', function($table) {
            $table->increments('id');

            $table->string('name', 255);
            $table->integer('folder_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('mime');
            $table->boolean('secure');
            $table->string('visibility');
            $table->integer('size');
            $table->text('misc'); // Misc json_encode'd data
            $table->boolean('s3');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('folder_id')->references('id')->on('cfs_folders');
        });

        // Now let's migrate the old cfs data

        /*
        $cfs = DB::table('cfs')->get();
        foreach($cfs as $file) {
            if(!empty($file->folder)) {
                if(CFSFolder::where('name', $file->folder)->where('user_id', $file->user_id)) continue;

                if (strpos($file->folder,'/') !== false) {
                    // if subfolders

                    $folders = explode('/', $file->folder);
                    foreach($folders as $folder) {
                        $parent = CFSFolder::where('user_id', $file->user_id)->where('name', $file->folder)->first();
                        $pid = null;
                        if($parent) $pid = $parent->id;

                        CFSFolder::create(array(
                            'name' => $folder,
                            'user_id' => $file->user_id,
                            'parent_id' => $pid
                        ));
                    }
                } else {
                    // good clean folder

                    CFSFolder::create(array(
                        'name' => $file->folder,
                        'user_id' => $file->user_id
                    ));
                }

            }

            if (strpos($file->folder,'/') !== false) {
                // if this file has subfolders hate yourself php script

            } else {
                // get the folder id
                $folder = CFSFolder::where('user_id', $file->user_id)->where('name', $file->folder)->first();

                CFSFile::create(array(
                    'name' => $file->name,
                    'folder_id' => $folder->id,
                    'user_id' => $file->user_id,
                    'mime' => $file->mime,
                    'secure' => $file->secure,
                    'visibility' => $file->visibility,
                    'size' => $file->size,
                    'cloud' => $file->s3,
                ));

            }
        }
        */

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        die('This migration cannot be reverted.');
		// there's no going back.
	}

}
