<?php

function e($raw) {
    if (isset($raw)) {
        return htmlspecialchars($raw);
    }
}
