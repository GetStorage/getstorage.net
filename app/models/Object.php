<?php

class Object extends Eloquent {

    protected $hidden = array('id', 'user_id', 'path', 'file', 's3');

    public function shortOriginal() {
        return substr($this->getAttribute('original'), 0, 8);
    }

    public function size() {
        return self::bytesToSize($this->getAttribute('size'));
    }

    public function bandwidthUsage() {
        $size = $this->getAttribute('size') * ObjectHit::where('object_id', $this->getAttribute('id'))->count();

        return self::bytesToSize($size);
    }

    private function bytesToSize($bytes, $precision = 2) {
        $kilobyte = 1024;
        $megabyte = $kilobyte * 1024;
        $gigabyte = $megabyte * 1024;
        $terabyte = $gigabyte * 1024;

        if(($bytes >= 0) && ($bytes < $kilobyte)) {
            return $bytes . ' B';

        } elseif(($bytes >= $kilobyte) && ($bytes < $megabyte)) {
            return round($bytes / $kilobyte, $precision) . ' KB';

        } elseif(($bytes >= $megabyte) && ($bytes < $gigabyte)) {
            return round($bytes / $megabyte, $precision) . ' MB';

        } elseif(($bytes >= $gigabyte) && ($bytes < $terabyte)) {
            return round($bytes / $gigabyte, $precision) . ' GB';

        } elseif($bytes >= $terabyte) {
            return round($bytes / $terabyte, $precision) . ' TB';
        } else {
            return $bytes . ' B';
        }
    }

}
