<?php
  session_start();
  $ctr = $_POST['ctr'];
  $selectedThIdArray = array();
  for($i=1; $i <= $ctr; $i++){
    $checkBoxName = "thCheckBox" . $i;
    //now get the value...
    $selectedThIdArray[$i-1] = $_POST["$checkBoxName"];
  }//end for loop

  $_SESSION['SELECTED_THS'] = $selectedThIdArray;
  var_dump($_SESSION['SELECTED_THS']);
?>
