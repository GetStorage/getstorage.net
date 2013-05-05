<?php


class CFS extends Eloquent {

    protected $hidden = array('id', 'user_id', 's3');

    protected $table = 'cfs';

    /**
     * Let's make sure we don't have any trailing or useless path seperators
     *
     * @param $folder
     * @return string
     */
    public static function cleanFolder($folder) {
        $folders = explode('/', $folder);

        if(count($folders) > 0) {
            return implode('/', $folders);
        } else {
            return '';
        }
    }

}
