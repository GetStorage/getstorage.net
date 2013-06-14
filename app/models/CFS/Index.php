<?php

namespace CFS;
use Redis;

class Index {

    public static function get($path) {
        $record = Redis::get($path);

        if($record) {
            return $record;
        } else {
            return false;
        }
    }

    public static function put($path, $type, $id) {

        return Redis::set($path, $type.'_'.$id);

    }

    public static function clear() {
        return Redis::flushdb();
    }

}