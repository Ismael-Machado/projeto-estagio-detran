<?php

function getDateAsDateTime($date) {
    return is_string($date) ? new DateTime($date) : $date;
}

function getFirstDayOfMonth($date) {
   $time = getDateAsDateTime($date)->getTimestamp();
   return new DateTime(date('Y-m-1', $time));
}

function getLastDayOfMonth($date) {
    $time = getDateAsDateTime($date)->getTimestamp();
    return new DateTime(date('Y-m-t', $time));
}