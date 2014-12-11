<?php
    error_reporting( 0 );
    session_start();
    if(!!empty($_SESSION['USER_ID'])){
        header("Location: login.php");
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
        <link rel='stylesheet' type='text/css' href='css/jquery.weekcalendar.css' />
        <link rel='stylesheet' type='text/css' href='css/demo.css' />


        <script type="text/javascript" src="js/modernizr.custom.15150.js" ></script>
        <script type="text/javascript" src="js/accordion.js" ></script>
        <!--this part is done for the calendar-->
        <link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.css' />
        <link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.print.css' media='print' />
        <!--<script type='text/javascript' src='jquery/jquery-1.7.1.min.js'></script>-->
        <script type='text/javascript' src='jquery/jquery-ui-1.8.17.custom.min.js'></script>
        <script type='text/javascript' src='fullcalendar/fullcalendar.min.js'></script>
        <script type='text/javascript' src='fullcalendar/gcal.js'></script>
        <script type='text/javascript' src='js/jquery.weekcalendar.js'></script>
        <script type='text/javascript' src='js/demo.js'></script>
        <!--end calendar code importing-->
    </head>
    <body id="step5">
        <div id="sb-site">
            <div id="dtool" class="5dcontain">
                <?php
                    require 'menurow.php';
                    require 'steprowcalendar.php';
                    //require 'contentcalendar.php';
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
                        <label for="body">Body: </label><textarea name="body"></textarea>
                      </li>
                    </ul>
                  </form>
                </div>
            </div>
            <?php
                require_once 'headerfileimports.php';
                require 'footercalendar.php';
            ?>
        </div>
        <?php
            require 'sidebar.php';
            require 'importjsscripts.php';
        ?>
    </body>
</html>
