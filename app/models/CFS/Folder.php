<?php

namespace CFS;
use Eloquent;

class Folder extends Eloquent {

    protected $table = 'cfs_folders';

    protected $guarded = array('id');

    public function files() {
        return $this->hasMany('CFS\File', 'folder_id');
    }

    /**
     * Create a recursive directory and return the last folder_id
     * 
     * @param  User $user
     * @param  array $folders
     * @return int $folder_id
     */
    public static function createRecursive($user, $folders) {

        $parent = null;

        $check = self::where('name', $folders[0])->where('parent_id', null)->first();
        if(is_null($check)) {
            // Our root folder doesn't exist. we'll need to creare the entire folder structure
            foreach($folders as $folder) {
                $record = self::create(array(
                    'name' => $folder,
                    'parent_id' => $parent,
                    'user_id' => $user->id
                ));

                $parent = $record->id;
            }

        } else {
            // Folder does exist.

            // We'll need to loop through every folder, checking to make sure that if it doesn't exist, create it.
            // 0 = null
            // 1 = 0
            // 2 = 1
            $parent = self::where('name', $folders[0])->where('parent_id', null)->first()->id;
            array_shift($folders);

            foreach($folders as $folder) {
                $check = self::where('name', $folder)->where('parent_id', $parent)->first();
                if(is_null($check)) {

                    // Create
                    $record = self::create(array(
                        'name' => $folder,
                        'parent_id' => $parent,
                        'user_id' => $user->id
                    ));

                    $parent = $record->id;
                } else {
                    $parent = $check->id;    
                }
                
            }

        }

        return $parent;
    }

    public static function ok() {
        return true;
    }

}
