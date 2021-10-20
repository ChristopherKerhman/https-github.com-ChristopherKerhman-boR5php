<?php
function brassageDate($data) {
  $date = $data;
  $year = substr($date,0,4);
  $month = substr($date,5,2);
  $day = substr($date,8,2);
  $date = $day.'/'.$month.'/'.$year;
  return $date;
}
 ?>
