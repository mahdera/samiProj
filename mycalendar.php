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
      <!--<script type='text/javascript' src="js/jquery-1.11.1.js"></script>-->
      <!-- for the datetime picker -->
      <!--<script type="text/javascript" src="js/jquery-ui.js"></script>-->
      <link href="css/jquery-ui.css" rel="stylesheet">
      <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
      <link rel="stylesheet" href="css/slidebars.css">
      <!--<link rel="stylesheet" media="all" type="text/css" href="css/jquery-impromptu.css" />-->
      <script type="text/javascript" src="js/modernizr.custom.15150.js" ></script>
      <script type="text/javascript" src="js/accordion.js" ></script>
    </head>
    <body id="step5" style="position:fixed">
        <div id="sb-site" style="position:fixed"><!--this nailed the bigger div from scrolling-->
            <div id="dtool" class="5dcontain" style="overflow:scroll">
                <?php
                    require_once 'menurow.php';
                    require_once 'steprowcalendar.php';
                ?>
                <div id='calendar'></div>
                <div id="event_edit_container">
                  <form>
                    <input type="hidden" />
                    <ul>
                      <li>
                        <span>Date: </span><span class="date_holder"></span>
                      </li>
                      <li>
                        <label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
                      </li>
                      <li>
                        <label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
                      </li>
                      <li>
                        <label for="title">Title: </label><input type="text" name="title" />
                      </li>
                      <li>
                        <label for="location">Location: </label><textarea name="location"></textarea>
                      </li>
                      <li>
                        <label for="body">Body: </label><textarea name="body"></textarea>
                      </li>
                    </ul>
                  </form>
                </div>
            </div>
        </div>
        <?php
            require_once 'sidebar.php';
            require_once 'headerfileimports.php';
        ?>
    </body>
</html>
