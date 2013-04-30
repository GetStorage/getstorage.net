<?php

class SiteLog extends Eloquent {

    protected $table = 'logs';

    public function shortMessage() {
        return strtok($this->getAttribute('message'), PHP_EOL);
    }

}
