<?php

namespace CFS;
use Input;
use Request;

/**
 * This is a helper class for CFSFile and CFSFolder
 *
 * Class CFS
 */
class Helper {

    public static function type($path) {
        // Clean the path
        $segments = explode('/', $path);
        //$path = implode('/', array_slice($segments, $path));

        // Look in our index
        $file = File::where('path', $path)->first();


        return 'file';
    }

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

    /**
     * Returns a tree of the users folder.
     *
     * @param $user
     * @param string $folder
     * @return mixed
     */
    public static function tree($user, $folder = '') {
        $all = array();

        // get all of our folders
        $folders = Folder::where('user_id', $user->id)->get();
        foreach($folders as $folder) {
            $files = $folder->files()->get();

            $all[$folder->name] = array();

            foreach($files as $file) {
                $name = $file->name;
                unset($file->name);

                $all[$folder->name][$name] = $file;
            }
        }

        return $all;
    }

}
