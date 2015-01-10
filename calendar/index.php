<?php 
// Require our Event class and datetime utilities
require dirname(__FILE__) . '/php/utils.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar.css' rel='stylesheet' />
<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='fullcalendar.min.js'></script>

<link  href='jquery-ui.css' rel='stylesheet' media="screen">
<script src="lib/jquery-ui.js"></script>
<script>

	$(document).ready(function() {
		var global_defaultDate = '<?php echo currentDate('Y-m-d');?>';
		var global_start, global_end;
		 var dialog, editDialog, form,
		 // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
		title = $( "#title" );
		
		var selectedEventId, 
				selectedEventTitle,
				selectedEventStart,
				selectedEventEnd,
				selectedEventLocation,
				selectedEventBody;
		//tips = $( ".validateTips" );
		
		 function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
			o.addClass( "ui-state-error" );
			updateTips( "Length of " + n + " must be between " +
			min + " and " + max + "." );
			return false;
			} else {
			return true;
			}
		}
		 function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
			o.addClass( "ui-state-error" );
			updateTips( n );
			return false;
			} else {
			return true;
			}
		}


		dialog = $( "#dialog-form" ).dialog({
			 autoOpen: false,
			 modal: true,
			 buttons: {
				 "Save": addEvent,
				 Cancel: function() {
				 $( this ).dialog( "close" );
				 }
				 
				 },
			 show: {
			 //effect: "blind",
			 //duration: 1000
			 },
			 hide: {
			 //effect: "explode",
			 //duration: 1000
			 }
			 });


		editDialog = $( "#dialog-edit-form" ).dialog({
			 autoOpen: false,
			 modal: true,
			 buttons: {
				 "Save": editEvent,
				 "Delete": deleteEvent,
				 Cancel: function() {
				 $( this ).dialog( "close" );
				 }
				 
				 }
			 });

		function deleteEvent(){
			var c;
			 var editId = selectedEventId;
			 var editTitle = $("#title-ed");
			 var editStart = $("#start-ed");
			 var editEnd = $("#end-ed");
			 var editBody = $("#body-ed");
			 var editLocation = $("#location-ed");

			if(confirm("This will delete the selected event permanently.\n Continue?")){

				var dataString = "action=delete&id=" + selectedEventId;
				
			    $.ajax({
	                   url: 'php/eventsController.php',
	                   data: dataString,
	                   type:'POST',
	                   success:function(response){
						 selectedEventId = null;
						 selectedEventTitle = null;
						 selectedEventStart = null;
						 selectedEventEnd = null
						 selectedEventLocation = null;
						 selectedEventBody = null;
						 
						$("#title-ed").val("");
						$("#start-ed").val("");
						$("#end-ed").val("");
						$("#location-ed").val("");
						$("#body-ed").val("");
						 
	                   	editDialog.dialog( "close" );
	                   },
	                   error:function(error){
	                     alert(error);
	                   }
	                 });

			    $("#calendar").fullCalendar( 'refetchEvents' );
			}
		}
		 function editEvent(){
			 var valid=true;
			 
			 var editId = selectedEventId;
			 var editTitle = $("#title-ed");
			 var editStart = $("#start-ed");
			 var editEnd = $("#end-ed");
			 var editBody = $("#body-ed");
			 var editLocation = $("#location-ed");
			 
			 function isNumber(n) { return /^-?[\d.]+(?:e-?\d+)?$/.test(n); } 
			 
			 valid = valid && checkLength( editTitle, "Event Title", 3, 255 );
			 valid = valid && checkRegexp( editTitle, /^[a-z]([0-9a-z_\s])+$/i, "Title may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );

			 if(valid){
                 if (editTitle.val()) {
 					eventData = {
 						title: editTitle.val(),
 						start: new Date(editStart.val()),
 						end: new Date(editEnd.val())
 					};
			 }
			 
			 var dataString ="";
			 	if(isNumber(editStart.val()) && isNumber(editEnd.val())) {
					dataString = "action=update&id=" + editId + "&start="+ (selectedEventStart/1000)+"&end="+ (selectedEventEnd/1000) +"&title="+encodeURIComponent(editTitle.val())+"&body="+encodeURIComponent(editBody.val())+
                 "&location="+encodeURIComponent(editLocation.val());
				}
				else if(isNumber(editStart.val())){
					dataString = "action=update&id=" + editId + "&start="+ (selectedEventStart/1000)+"&end="+ (new Date(editEnd.val()).getTime()/1000) +"&title="+encodeURIComponent(editTitle.val())+"&body="+encodeURIComponent(editBody.val())+
                 "&location="+encodeURIComponent(editLocation.val());
				}
				else if(isNumber(editEnd.val())){
					dataString = "action=update&id=" + editId + "&start="+ (new Date(editStart.val()).getTime()/1000)+"&end="+ (selectedEventEnd/1000) +"&title="+encodeURIComponent(editTitle.val())+"&body="+encodeURIComponent(editBody.val())+
                 "&location="+encodeURIComponent(editLocation.val());
				}
				else{
                  dataString = "action=update&id=" + editId + "&start="+ (new Date(editStart.val()).getTime()/1000)+"&end="+(new Date(editEnd.val()).getTime()/1000)+"&title="+encodeURIComponent(editTitle.val())+"&body="+encodeURIComponent(editBody.val())+
                 "&location="+encodeURIComponent(editLocation.val());
				}
                
                 $.ajax({
                   url: 'php/eventsController.php',
                   data: dataString,
                   type:'POST',
                   success:function(response){
                     
					 selectedEventId = null;
					 selectedEventTitle = null;
					 selectedEventStart = null;
					 selectedEventEnd = null
					 selectedEventLocation = null;
					 selectedEventBody = null;
					 
					$("#title-ed").val("");
					$("#start-ed").val("");
					$("#end-ed").val("");
					$("#location-ed").val("");
					$("#body-ed").val("");
					 
                   	editDialog.dialog( "close" );
                   },
                   error:function(error){
                     alert(error);
                   }
                 });
                 $("#calendar").fullCalendar( 'refetchEvents' );
		 }
		 	$("#title-ed").val("");
			$("#start-ed").val("");
			$("#end-ed").val("");
			$("#location-ed").val("");
			$("#body-ed").val("");
		 	editDialog.dialog("close");
		 }
		
		 function addEvent() {
			var valid = true;
			
			var titleVal = $("#title").val();
			var startTime = $( "#startTime" );
		    var endTime = $( "#endTime" );
			var body = $("#body");
	        var location = $("#location");
			
			valid = valid && checkLength( $("#title"), "Event Title", 3, 255 );
			
			valid = valid && checkRegexp( $("#title"), /^[a-z]([0-9a-z_\s])+$/i, "Title may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
			//valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
			//valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
			if ( valid ) {
				var eventData;
				if (titleVal) {
					eventData = {
						title: titleVal,
						start: new Date(startTime.val()),
						end: new Date(endTime.val())
					};

	                  var dataString = "action=save&start=" + (new Date(startTime.val()).getTime()/1000) + "&end="+(new Date(endTime.val()).getTime()/1000)+"&title="+encodeURIComponent(titleVal)+"&body="+encodeURIComponent(body.val())+
	                  "&location="+encodeURIComponent(location.val());
	                  
	                  $.ajax({
	                    url: 'php/eventsController.php',
	                    data: dataString,
	                    type:'POST',
	                    success:function(response){
	                      //$calendar.weekCalendar("removeUnsavedEvents");
	                      //$calendar.weekCalendar("updateEvent", calEvent);
						    $("#title").val("");
							startTime.val("");
							endTime.val("");
							location.val("");
							body.val("");
							
	                    	dialog.dialog( "close" );
	                    },
	                    error:function(error){
	                      alert(error);
	                    }
	                  });
	                  $("#calendar").fullCalendar( 'refetchEvents' );
				}
				/*
			$( "#users tbody" ).append( "<tr>" +
			"<td>" + name.val() + "</td>" +
			"<td>" + email.val() + "</td>" +
			"<td>" + password.val() + "</td>" +
			"</tr>" );
			*/
			
				$("#title").val("");
				startTime.val("");
				endTime.val("");
				location.val("");
				body.val("");
				dialog.dialog( "close" );
			
			}
			return valid;
		}

			function populateStartEndLists(iniD){
				var dateIncrementor = new Date(iniD);
				dateIncrementor = addMinutes(dateIncrementor, 285);
				
				$("#startTime").html("<option value=''>Start Time</option>");
				$("#endTime").html("<option value=''>End Time</option>");
				
				function addMinutes(date, minutes) {
				    return new Date(date.getTime() + minutes*60000);
				}
				
				for(i=0; i<96; i++){
					var minutes = 15;
					dateIncrementor = addMinutes(dateIncrementor, minutes);
					$("#startTime").append("<option value='" + dateIncrementor + "'>" + (dateIncrementor.getMonth()+1) + "/" + dateIncrementor.getDate() + " " + dateIncrementor.getHours() + ":" + dateIncrementor.getMinutes() + ":" + dateIncrementor.getSeconds() + "</option>");
					$("#endTime").append("<option value='" + dateIncrementor + "'>" + (dateIncrementor.getMonth()+1) + "/" + dateIncrementor.getDate() + " " + dateIncrementor.getHours() + ":" + dateIncrementor.getMinutes() + ":" + dateIncrementor.getSeconds() + "</option>");
				}
			}
			
			function populateEditStartEndLists(startDate, endDate){
				var d = dateIncrementor = new Date(endDate);
				
				$("#start-ed").html("<option value=''>Start Time</option>");
				$("#end-ed").html("<option value=''>End Time</option>");
				
				function addMinutes(date, minutes) {
				    return new Date(date.getTime() + minutes*60000);
				}
				
				
				for(i=0; i<96; i++){
					var minutes = 15;
					dateIncrementor = addMinutes(dateIncrementor, minutes);
					var startSelected = (dateIncrementor==startDate) ? "selected = 'selected'" : "";
					var endSelected = (dateIncrementor==endDate) ? "selected = 'selected'" : "";
					
					$("#start-ed").append("<option value='" + dateIncrementor + "' " + startSelected + ">" + dateIncrementor.getHours() + ":" + dateIncrementor.getMinutes() +  "</option>");
					$("#end-ed").append("<option value='" + dateIncrementor + "'" +  endSelected + ">" + dateIncrementor.getHours() + ":" + dateIncrementor.getMinutes() + "</option>");
				}
			}
		
		 $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: global_defaultDate,
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				//var title = prompt('Event Title:');
				global_start = start;
				global_end = end;

				
				$("#selectedDate").html(start.toISOString());
				populateStartEndLists(start.toISOString());
				
				dialog.dialog( "open" );
				
				/*
				var title = titles.val();
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
				}
				*/
				$('#calendar').fullCalendar('unselect');
			},
			editable: true,
			eventLimit: true, // allow "more" link when too many events

			events: {
				url: 'php/eventsController.php',
				type: 'POST',
		        data: {
		            action: 'read'
		        },
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			},
			
			dayClick: function(date, jsEvent, view) {
				
				 
					 //$( "#dialog" ).dialog( "open" );
					 
				 //alert('Clicked on: ' + date.format());

			        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

			        //alert('Current view: ' + view.name);

			        // change the day's background color just for fun
			       // $(this).css('background-color', 'red');

		    },

			eventClick: function(calEvent, jsEvent, view) {
				
		        //alert('Event: ' + calEvent.id);
				selectedEventId = calEvent.id;
				selectedEventTitle = calEvent.title;
				selectedEventStart = calEvent.start
				selectedEventEnd = calEvent.end;
				selectedEventLocation = calEvent.location;
				selectedEventBody = calEvent.body;
				
				populateEditStartEndLists(selectedEventStart, selectedEventEnd);
				
				var startDate  = new Date(selectedEventStart);
				var endDate = new Date(selectedEventEnd);
				
				$("#title-ed").val(selectedEventTitle);
				$("#start-ed").append("<option selected='selected' value='" + selectedEventStart + "'>" + startDate.getHours() + ":" + startDate.getMinutes() +  "</option>");
				$("#end-ed").append("<option selected='selected' value='" + selectedEventEnd + "'>" + endDate.getHours() + ":" + endDate.getMinutes() + "</option>");
				//$("#start-ed").val(selectedEventStart);
				//$("#end-ed").val(selectedEventEnd);
				
				$("#location-ed").val(selectedEventLocation);
				$("#body-ed").val(selectedEventBody);
				//alert(selectedEventBody);
				editDialog.dialog( "open" );
		        //alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
		        //alert('View: ' + view.name);

		        // change the border color just for fun
		        //$(this).css('border-color', 'red');

		    }
		});

		 form = dialog.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			addEvent();
		});
		
		formS = editDialog.find( "form" ).on( "submit", function( event ) {
			event.preventDefault();
			editEvent();
		});
		
	});

</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
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
<body>

	<div id='loading'>loading...</div>
	<div id='calendar'></div>

<div id="dialog-form" title="New Event">
<!--  <p class="validateTips">All form fields are required.</p> -->
<form id="new-calendar-event-form">
<fieldset class="calendar-fieldset">
<ul>
<li>
<label><span>Date:</span><span id="selectedDate"></span></label>
</li>
<li>
<label for="title">Name / Title</label>
<input type="text" name="title" id="title" value="" class="text ui-widget-content ui-corner-all">
</li>
<li>
<label for="start">Start Time:</label>
<select name="start" id="startTime" class="text ui-widget-content ui-corner-all">
</select>
</li>

<li>
<label for="end">End Time:</label>
<select name="end" id="endTime" class="text ui-widget-content ui-corner-all">
</select>
</li>

<li>
<label for="location">Location:</label>
<textarea rows="3" cols="25" name="location" id="location" class="text ui-widget-content ui-corner-all"></textarea>
</li>

<li>
<label for="body">Body:</label>
<textarea rows="3" cols="25" name="body" id="body" class="text ui-widget-content ui-corner-all"></textarea>
</li>

<!-- Allow form submission with keyboard without duplicating the dialog button -->
<input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
</ul>
</fieldset>
</form>
</div>



<div id="dialog-edit-form" title="Edit Event">
<!--  <p class="validateTips">All form fields are required.</p> -->
<form id="new-calendar-event-form">
<fieldset class="calendar-fieldset">
<ul>
<li>
<label><span>Date:</span><span id="selectedDate"></span></label>
</li>
<li>
<label for="title">Name / Title</label>
<input type="text" name="title" id="title-ed" value="" class="text ui-widget-content ui-corner-all">
</li>
<li>
<label for="start">Start Time:</label>
<select name="start" id="start-ed" class="text ui-widget-content ui-corner-all">
</select>
</li>

<li>
<label for="end">End Time:</label>
<select name="end" id="end-ed" class="text ui-widget-content ui-corner-all">
</select>
</li>

<li>
<label for="location">Location:</label>
<textarea rows="3" cols="25" name="location" id="location-ed" class="text ui-widget-content ui-corner-all"></textarea>
</li>

<li>
<label for="body">Body:</label>
<textarea rows="3" cols="25" name="body" id="body-ed" class="text ui-widget-content ui-corner-all"></textarea>
</li>

<!-- Allow form submission with keyboard without duplicating the dialog button -->
<input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
</ul>
</fieldset>
</form>
</div>

</body>
</html>
