<?php
session_start();
if(empty($_SESSION['USER_ID'])){
  header("Location: login.php");
}

if($_SESSION['USER_ROLE_CODE'] === '01A'){
  if(empty($_SESSION['SUB_DISTRICT_ID'])){
    header("Location: nosubdistrictselected.php");
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>title</title>
  <script type='text/javascript' src="js/jquery-1.11.1.js"></script>
  <!-- for the datetime picker -->
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <link href="css/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/slidebars.css">
  <link rel="stylesheet" media="all" type="text/css" href="css/jquery-impromptu.css" />
  <script type="text/javascript" src="js/modernizr.custom.15150.js" ></script>
  <script type="text/javascript" src="js/accordion.js" ></script>
</head>
<body id="step5">
  <div id="sb-site">
    <div id="dtool" class="5dcontain">
      <?php
      require 'menurow.php';
      require 'steprowmyaccount.php';
      require 'contentstepmyaccounttfullstatic.php';
      ?>
    </div>
    <?php
    require 'footer.php';
    ?>
  </div>
  <?php
  require 'sidebar.php';
  require 'importjsscripts.php';
  ?>
</body>
</html>
