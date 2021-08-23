<?php

if( !function_exists('change_date_format') ) {
    function change_date_format($date, $date_format) {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
    }
}

if( !function_exists('seconds_to_hours') ) {
    function seconds_to_hours(int $seconds) {
        return $seconds / 3600;
    }
}
