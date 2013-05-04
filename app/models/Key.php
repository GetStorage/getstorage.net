<?php

class Key extends Eloquent {

    /**
     * Aww yiss
     *
     * @return string
     */
    public static function generateKey() {
        return hash('sha1', uniqid('', true));
    }

    public static function userHasKey($user, $key) {
        return !self::where('key', $key)->andWhere('user_id', $user->id);
    }

}
