<?php
    session_start();
    require_once 'fn.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';
    //require_once 'userdistrict.php';

    $fnList = null;
    //$fnList = getAllFnsModifiedByThisUser($_SESSION['LOGGED_USER_ID']);
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    if($userObj->user_level == '02'){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
      $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }

    $functions = array();
    $response = array();

    $functions[] = array('fnId' => '', 'fnName'=> '--Select--');

    while($row=mysql_fetch_array($fnList)){
      $fnId = $row['id'];
      $fnName = $row['fn_name'];
      $functions[] = array('fnId'=> $fnId, 'fnName'=> $fnName);
    }

    $response['functions'] = $functions;

    echo json_encode($response);
?>
