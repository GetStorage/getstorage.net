<?php


class CFSFile extends Eloquent {

    protected $table = 'cfs_files';

    protected $guarded = array('id');

    public function folder() {
        return $this->belongsTo('CFSFolder');
    }

}
