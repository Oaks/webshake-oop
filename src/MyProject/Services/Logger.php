<?php

namespace MyProject\Services;

trait Logger {
    function log($msg) {
        /* echo '<pre>'; */
        /* echo date('Y-m-d h:i:s') . ':' . '(' . __CLASS__. ') ' . $msg . '<br/>'; */
        /* echo '</pre>'; */
        echo sprintf("<pre>%s:(%s) %s<br/></pre>", date('Y-m-d h:i:s'), get_class($this), $msg );
    }
}
