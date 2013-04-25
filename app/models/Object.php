<?php

class Object extends Eloquent {

    protected $hidden = array('id','user_id','path','file','s3');

    public function shortOriginal() {
        return substr($this->getAttribute('original'), 0, 8);
    }

}
