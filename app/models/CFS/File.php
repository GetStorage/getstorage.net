<?php

namespace CFS;
use Eloquent;

class File extends Eloquent {

    protected $table = 'cfs_files';

    protected $guarded = array('id');

    protected $hidden = array('id', 'folder_id', 'user_id');

    protected $touches = array('folder');

    public function folder() {
        return $this->belongsTo('CFS\Folder');
    }


    // Mutators
    public function path() {
        $parent = Folder::where('id', $this->attributes['folder_id'])->first();

        $path = $parent->name;

        if($parent->parent_id != null) {
            // loop until we find null, creating the path as we go.
            $subParent = Folder::where('id', $parent->parent_id);
            
        }

        return $path . '/' . $this->name;
    }


    public static function ok() {
        return true;
    }

}
