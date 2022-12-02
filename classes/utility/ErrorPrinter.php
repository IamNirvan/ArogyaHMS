<?php

class ErrorPrinter {
    public static function printError($tag, $message) {
        echo "Something went wrong<br><strong>[<u>$tag</u>]:</strong> $message";
    }
}