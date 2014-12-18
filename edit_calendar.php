<?php
error_reporting( 0 );
session_start();
include ("connect.inc");
$db=public_db_connect();
	$year = date('Y');
	$month = date('m');

$command = "SELECT * FROM calendar_urls ";
$result = mysql_query($command, $db);

while ($row = mysql_fetch_assoc($result)) {

    $url =  $row['calendar_array'];
    $urls[] = $url;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
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
		//get_string(),
	    /*'https://www.google.com/calendar/feeds/kelchuk68%40gmail.com/public/basic',
		'events.php',*/
		<?php echo implode(",", $urls); ?>
		]
		  });
});
</script>
<style type='text/css'>

	body {
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
</head>
<body>

<?php if($_GET['calendarid']){
$calendarid = mysql_real_escape_string($_GET['calendarid']);
?>
<div style="display:block; width:900px; margin: 0 auto; ">
<div style="float:right; margin-bottom:10px;">
<form style="display:visible;" action="mycalendar.php" method="post">
<input style="display:visible;" type="submit" name="add_event" value="Add Event"/>
</form>
<p style="display:none">Add Event | Edit Event | Delete Event</p></div>
</div>

<div style="clear:both;"></div>

<?php
if(@$_POST['myupdate']){
	$command_update = "UPDATE calendar SET title='{$_POST['event_title']}', notes='{$_POST['notes']}', start='{$_POST['mydate']}' WHERE id='$calendarid' ";
	$result_update = mysql_query($command_update, $db);
	if($result_update) {
		echo '<div style="margin:20px;">Update successful!</div>';
	}
}else if(@$_POST['mydelete']){
	$command_delete = "DELETE FROM calendar WHERE id='$calendarid' ";
	$result_delete = mysql_query($command_delete, $db);
	if($result_delete) {
		echo '<div style="margin:20px;">Deleted successfully!</div>';
	}

}

$command = "SELECT * FROM calendar where id ='{$_GET['calendarid']}' ";
$result = mysql_query($command, $db);

while($row = mysql_fetch_assoc($result)){

		$year = date("Y");
		$year2= $year + 1;
		$mymonth = date("m");
		$day = date("d");?>
		<div style="background-color:grey; width:900px; margin:0 auto;padding-top:20px;padding-bottom:10px; border-radius:15px;">
		<form action="" method="post">
		<div style="float:left;margin-left:10px;">Title: <input style="margin:0 auto; text-align:left;" type="text" name="event_title" value="<?php echo $row['title']; ?>"/>

		<?php echo '<input type="text" name="mydate" value="'.$row['start'].'" />';


		echo'</div>';
		?><br/><br/>
		<div style="float:left;margin-left:10px;margin-bottom:5px;">Notes:</div>
		<textarea name="notes" style="width:880px; margin:0 auto;"><?php echo $row['notes']; ?></textarea><br/>

		<?php
		//only the event creator should be allowed to edit and delete an existing event
		if($_SESSION['LOGGED_USER_ID'] === $row['member_id']){
			echo '<input style="margin-top:10px;" type="submit" name="myupdate" value="Update Event"/>';
			echo '<input style="margin-top:10px;" type="submit" name="mydelete" value="Delete Event"/></form></div><br/><br/>';
		}
	}//end while loop
}//end if get calendar id at the very top of the code

/*if($_POST['adding']) {
$year = $_POST['year'];
$month = $_POST['month'];
$day= $_POST['day'];
$hour= $_POST['hour'];
$minutes= $_POST['minutes'];
$fulldate = $year."-".$month."-".$day." ".$hour.":".$minutes;

$command = "INSERT INTO calendar VALUES('','0', '{$_POST['event_title']}', '{$_POST['notes']}', '$fulldate','') ";
$result = mysql_query($command, $db);
if($result) {
echo "Successful Insert!";
}
}this is fun*/
?>

<div style="clear:both;"></div>
<div id='calendar'></div>
</body>
</html>
