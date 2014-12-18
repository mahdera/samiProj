<?php
  session_start();
  $subDistrictId = $_POST['subDistrictId'];
  $_SESSION['SUB_DISTRICT_ID'] = $subDistrictId;
?>
