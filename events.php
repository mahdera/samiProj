<?php

session_start();
date_default_timezone_set('America/Los_Angeles');
include ("connect.inc");
$db = public_db_connect();
$year = date('Y');
$month = date('m');

$command = "SELECT * FROM calendar WHERE id >'0' ";
$result = mysql_query($command, $db);

while ($row = mysql_fetch_assoc($result)) {
    //echo "hi";
    //$start = date("D, j M Y G:i:s T", strtotime($row['start']));
    //$end = date("D, j M Y G:i:s T", strtotime($row['end_time']));
    $start = date("Y-m-d", strtotime($row['start']));
    //$start = "$year-$month-20";
    $myid =  $row['id'];
    $eventsArray['id'] =  (int)trim($myid);
    $eventsArray['title'] = $row['title'];
    $title = date("g:ia", strtotime($row['start']))." ".$row['title'];

    //$title = $row['title'];
    //echo $title;
    $eventsArray['title'] = $title;
    $eventsArray['start'] = $start;
    /*$eventsArray['end'] = $start;*/
    $eventsArray['url'] = "edit_calendar.php?calendarid=".$row['id'];

    // $eventsArray['end'] = $end;
    // $eventsArray['allDay'] = false;
    $events[] = $eventsArray;
}
echo json_encode($events);
