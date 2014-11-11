<?php
    error_reporting( 0 );
    session_start();
    if(!isset($_SESSION['USER_ID'])){
        header("Location: login.php");
    }
    include ("connect.inc");
    $db=public_db_connect();
        $year = date('Y');
        $month = date('m');

    $command = "SELECT * FROM calendar_urls ";
    $result = mysql_query($command, $db);

    while ($row = mysql_fetch_assoc($result)) {

        $url =  $row['calendar_array'];
        $urls[] = $url;
    }//end while loop
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
        <!--this part is done for the calendar-->
        <link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.css' />
        <link rel='stylesheet' type='text/css' href='fullcalendar/fullcalendar.print.css' media='print' />
        <script type='text/javascript' src='jquery/jquery-1.7.1.min.js'></script>
        <script type='text/javascript' src='jquery/jquery-ui-1.8.17.custom.min.js'></script>
        <script type='text/javascript' src='fullcalendar/fullcalendar.min.js'></script>
        <script type='text/javascript' src='fullcalendar/gcal.js'></script>
        <script>
        $(document).ready(function() {

            $('#calendar').fullCalendar({

                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                editable: true,

                //events: 'https://www.google.com/calendar/feeds/kelchuk68%40gmail.com/public/basic/',

                eventSources: [
                /*get_string(),
                'https://www.google.com/calendar/feeds/kelchuk68%40gmail.com/public/basic',
                'events.php',*/
                <?php echo implode(",", $urlss); ?>
                ]
            });
        });
        </script>
<style type='text/css'>

    #calendarBody{
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        }

    #calendar {
        width: 900px;
        margin: 0 auto;
        }

</style>
        <!--end calendar code importing-->
    </head>
    <body id="step5">
        <div id="sb-site">
            <div id="dtool" class="5dcontain">
                <?php
                    require 'menurow.php';
                    require 'steprowcalendar.php';
                    require 'contentcalendar.php';
                ?>
            </div>
            <?php
                require 'footercalendar.php';
            ?>
        </div>
        <?php
            require 'sidebar.php';
            require 'importjsscripts.php';
        ?>
    </body>
</html>
