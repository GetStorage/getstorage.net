<?php


class LogHandler {

    public function fire($job, $data) {
        extract($data);

        DB::insert("INSERT INTO logs (php_sapi_name, level, message, context, created_at) VALUES (?, ?, ?, ?, ?)", array(
            $apiName,
            $level,
            $message,
            json_encode($context),
            $date
        ));
    }

}
