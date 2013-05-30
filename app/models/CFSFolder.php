<?php

class CFSFolder extends Eloquent {

    protected $table = 'cfs_folders';

    protected $guarded = array('id');

    public function files() {
        return $this->hasMany('CFSFile');
    }

}
