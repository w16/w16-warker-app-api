<?php

if (!function_exists('status_and_message')) {

    function status_and_message($message, $status = 200)
    {
        return response()->json(['message' => $message], $status);
    }

}