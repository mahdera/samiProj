<div class="content" id='step1Content'>
    <!--to be replaced when the next button is clicked-->
    <div id="topcontain">
        <div id="titlearea">
            <h1 id='currentPageTag'>Calendar</h1>
            <h2></h2>
            <h3></h3>
        </div>
        <div id="resourcearea">
            <ul>
                <li class="sb-toggle-right"><img src="images/resource_icon.png" alt="Resource Toolkit" /> Resource Toolkit</li>
            </ul>
        </div>
    </div>
    <div class="col-half left" id="calendarBody">
        <div style="display:block; width:900px; margin: 0 auto; ">
<div style="float:right; margin-bottom:10px;">
<form action="" method="post">
<input type="submit" name="add_event" value="Add Event"/>
</form>
<p style="display:none">Add Event | Edit Event | Delete Event</p></div>
</div>

<div style="clear:both;"></div>


<?php if(@$_POST['add_event']){
$year = date("Y"); 
$year2= $year + 1;
$mymonth = date("m"); 
$day = date("d");?>
<div style="background-color:grey; width:900px; margin:0 auto;padding-top:20px;padding-bottom:10px; border-radius:15px;">
<form action="" method="post">
<div style="float:left;margin-left:10px;">Title: <input style="margin:0 auto; text-align:left;" type="text" name="event_title" value=""/>
<select name ="year">
<?php echo '<option selected="selected">'.$year.'</option>';
echo '<option>'.$year2.'</option>';

echo '</select>';
?>

<select name ="month">
<?php 
$month = array($month);
echo '<option selected="selected">'.$mymonth.'</option>';
$months = array('01','02','03','04','05','06','07','08','09','10','11','12');
$months = array_diff($months,$month);

foreach($months as $month_opt){
echo '<option>'.$month_opt.'</option>';
}
echo '</select>';

?>

<select name="day">
<?php echo '<option selected="selected">'.$day.'</option>';
for($i=1; $i<32; $i++) {
echo '<option>'.$i.'</option>';
}

echo '</select>';
?>
&nbsp Hour: <select name="hour">
<?php 
$hours = array('00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23');

foreach($hours as $hour){
echo '<option>'.$hour.'</option>';
}

echo '</select>';

?>
&nbsp Minutes: <select name="minutes">
<?php 
$minutes = array('00','15','30','45');

foreach($minutes as $minute){
echo '<option>'.$minute.'</option>';
}

echo '</select>';
echo'</div>';
?><br/><br/>
<div style="float:left;margin-left:10px;margin-bottom:5px;">Notes:</div>
<textarea name="notes" style="width:880px; margin:0 auto;"></textarea><br/>

<?php
echo '<input style="margin-top:10px;" type="submit" name="adding" value="Add the Event"/></form></div><br/><br/>';
} 

if(@$_POST['adding']) {
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
}
?>
<div style="clear:both;"></div>
<div id='calendar'></div>
    </div><!-- /col-half --><!-- /col-half -->
    <!--end to be replaced content-->
</div> <!-- /content -->
