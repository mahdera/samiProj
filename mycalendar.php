<?php
// Require our Event class and datetime utilities
require dirname(__FILE__) . '/calendar/php/utils.php';

@session_start();
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

    <link href='calendar/fullcalendar.css' rel='stylesheet' />
    <link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href='calendar/custom.css' rel='stylesheet' media="screen" />
    <script src='calendar/lib/moment.min.js'></script>
    <!--<script src='calendar/lib/jquery.min.js'></script>-->
    <script src='calendar/fullcalendar.min.js'></script>

    <link  href='calendar/jquery-ui.css' rel='stylesheet' media="screen">
    <script src="calendar/lib/jquery-ui.js"></script>


    <script src="calendar/eop-calendar.js"></script>

    <script>
        var global_defaultDate = '<?php echo currentDate('Y-m-d');?>';
    </script>

    <style>

    body {

        overflow:auto;
    }

    #calendar {
        max-width: 98%;
        margin: 0 auto;
        height:100%;
    }

    .calendar-fieldset{
        border:0px;
        margin:0px;
        padding:0px;
    }

    .ui-dialog .ui-dialog-content{
        padding: .5em;
    }

    form#new-calendar-event-form label{
        display:block;
        margin:2px;
    }
    form#new-calendar-event-form ul{
        list-style-type:square;
        padding: .5em;
        margin:0em;
    }


</style>
</head>
<body id="step5">
    <div id="sb-site" ><!--this nailed the bigger div from scrolling-->
        <div id="dtool" class="5dcontain" style="overflow:scroll">
            <?php
                require_once 'menurowcalendar.php';
                require_once 'steprowcalendar.php';
            ?>
            <div id="myAccountDiv">
            </div>
            <div id="event_edit_container">
                <div id='loading'>loading...</div>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
    <?php
        include_once 'calendar/pageContent.php';
        //require_once 'sidebar.php';
        //require_once 'calendarimports.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function(){



            $('#logoutLink').click(function(){
                alert('this is clicked');
                /*var txt = 'Are you sure you want to logout?';

                $.prompt(txt,{
                    buttons:{"Logout":true, "Cancel":false},
                    close: function(e,v,m,f){

                        if(v){
                            $.ajax({
                                url: 'logout.php',
                                data: null,
                                type:'POST',
                                success:function(response){
                                    window.location = 'login.php';
                                },
                                error:function(error){
                                    alert(error);
                                }
                            });
                        }
                        else{}
                        }
                    });*/

            });
        });//end document.ready function
    </script>
</body>
</html>
