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
        return $this->attributes[''];
    }


    public static function ok() {
        return true;
    }

}
