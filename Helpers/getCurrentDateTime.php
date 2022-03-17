<?php
// Get localized date & time
function getCurrentDateTime($format) {
  $dateTime = new DateTime('now', new DateTimeZone('Europe/Berlin'));

  return $dateTime->format($format);
}