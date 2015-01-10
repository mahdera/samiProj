<?php
    session_start();

    require_once 'Event.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';

    $userObj = getUser($_SESSION['LOGGED_USER_ID']);

    $action = null;
    if(isset($_REQUEST['action']))
      $action = $_REQUEST['action'];

    if($action == 'save'){
    	$title = addslashes($_REQUEST['title']);
    	$body = addslashes($_REQUEST['body']);
    	$start_time = (int)$_REQUEST['start'];
    	$start_time = $start_time - 21600;
    	$end_time = (int)$_REQUEST['end'];
    	$end_time = $end_time - 21600;
    	$start = date('c',$start_time);
    	$end = date('c',$end_time);
      $location = addslashes($_REQUEST['location']);
      //first determine the status of the logged in user...is the user district admin or sub district user...
      $modifiedBy = null;


      if($userObj->user_level == '01'){
          $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          if(!empty($userObject)){
              $modifiedBy = $userObject->id;
          }
      }else if($userObj->user_level == '02'){
          $modifiedBy = $_SESSION['LOGGED_USER_ID'];
      }


      //now create the Event object...
      $eventObj = new Event();
      $eventObj->setTitle($title);
      $eventObj->setBody($body);
      $eventObj->setStartTime($start);
      $eventObj->setEndTime($end);
      $eventObj->setModifiedBy($modifiedBy);
      $eventObj->setLocation($location);
      $event = new Event();
      $event->save($eventObj);
    }else if($action == 'read'){
          //now I need to read all events only created by the session owner...
          $eventList = null;
          if($userObj->user_level == '02'){
              $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
              $eventList = Event::getAllEventsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
          }else if($userObj->user_level == '01'){
              $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
              if(!empty($userObj)){
                  $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
                  $eventList = Event::getAllEventsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
              }
          }

    	$events = array();

    	while ($row = mysql_fetch_assoc($eventList)) {
    	   $eventArray['id'] = $row['eId'];
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
      $modifiedBy = null;
      if($userObj->user_level == '01'){
          $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
          if(!empty($userObject)){
              $modifiedBy = $userObject->id;
          }
      }else if($userObj->user_level == '02'){
          $modifiedBy = $_SESSION['LOGGED_USER_ID'];
      }
      $eventObj->id = $id;
      $eventObj->title = $title;
      $eventObj->body = $body;
      $eventObj->startTime = $start;
      $eventObj->endTime = $end;
      $eventObj->modifiedBy = $modifiedBy;
      $eventObj->location = $location;
      if($eventObj != null){
        Event::update($eventObj);
      }
    }else if($action == 'delete'){
      $id = $_POST['id'];
      Event::delete($id);
    }
?>
