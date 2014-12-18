<?php
    session_start();
    require_once 'classes/Event.php';
    $action = null;
    if(isset($_REQUEST['action']))
      $action = $_REQUEST['action'];

    if($action == 'save'){
    	$title = addslashes($_POST['title']);
    	$body = addslashes($_POST['body']);
    	$start_time = (int)$_POST['start'];
    	$start_time = $start_time - 21600;
    	$end_time = (int)$_POST['end'];
    	$end_time = $end_time - 21600;
    	$start = date('c',$start_time);
    	$end = date('c',$end_time);
      $location = addslashes($_POST['location']);
      //now create the Event object...
      $eventObj = new Event();
      $eventObj->setTitle($title);
      $eventObj->setBody($body);
      $eventObj->setStartTime($start);
      $eventObj->setEndTime($end);
      $eventObj->setModifiedBy($_SESSION['LOGGED_USER_ID']);
      $eventObj->setLocation($location);
      $event = new Event();
      $event->save($eventObj);
    }else if($action == 'read'){
      //now I need to read all events only created by the session owner...
      $result = Event::getAllEventsForUser($_SESSION['LOGGED_USER_ID']);
    	$events = array();

    	while ($row = mysql_fetch_assoc($result)) {
    	   $eventArray['id'] = $row['id'];
    	   $eventArray['title'] =  stripslashes($row['title']);
    	   $eventArray['body'] =  stripslashes($row['body']);
    	   $eventArray['start'] = $row['startTime'];
    	   $eventArray['end'] = $row['endTime'];
         $eventArray['location'] = $row['location'];
    	   $events[] = $eventArray;
    	}
    	echo json_encode($events);
    }else if($action == 'update'){
      $id = $_POST['id'];
      $title = addslashes($_POST['title']);
      $body = addslashes($_POST['body']);
      $start_time = (int)$_POST['start'];
      $start_time = $start_time - 21600;
      $end_time = (int)$_POST['end'];
      $end_time = $end_time - 21600;
      $start = date('c',$start_time);
      $end = date('c',$end_time);
      $location = addslashes($_POST['location']);
      //now fetch the event object form the database...using title, start and end...
      $eventObj = Event::getEvent($id);
      //now set the new value to the object.
      $eventObj->id = $id;
      $eventObj->title = $title;
      $eventObj->body = $body;
      $eventObj->startTime = $start;
      $eventObj->endTime = $end;
      $eventObj->modifiedBy = $_SESSION['LOGGED_USER_ID'];
      $eventObj->location = $location;
      if($eventObj != null){
        Event::update($eventObj);
      }
    }else if($action == 'delete'){
      $id = $_POST['id'];
      Event::delete($id);
    }
?>
