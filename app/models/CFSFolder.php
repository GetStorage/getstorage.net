<?php

class CFSFolder extends Eloquent {

    protected $table = 'cfs_folders';

    protected $guarded = array('id');

    public function files() {
        return $this->hasMany('CFSFile');
    }

    public static function createRecursive($user, $folders) {

        $parent = null;
        foreach($folders as $folder) {
            $record = self::create(array(
                'name' => $folder,
                'parent_id' => $parent,
                'user_id' => $user->id
            ));

            $parent = $record->id;
        }
    }

}
