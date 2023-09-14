<?php

function getDateAsDateTime($date) {
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date) {
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6;
}

function getFirstDayOfMonth($date) {
   $time = getDateAsDateTime($date)->getTimestamp();
   return date('Y-m-1', $time);
}

function getLastDayOfMonth($date) {
    $time = getDateAsDateTime($date)->getTimestamp();
    return date('Y-m-t', $time);
}