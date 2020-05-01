<?php

namespace MyProject\Services;

trait Logger {
    function log($msg) {
        date_default_timezone_set('Europe/Helsinki');
        echo sprintf("<pre>%s:(%s) %s<br/></pre>", date('Y-m-d H:i:s'), __CLASS__, $msg );
    }
}
