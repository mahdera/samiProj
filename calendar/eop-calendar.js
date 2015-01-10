$(document).ready(function() {
	
	 
    $('#logoutLink').click(function(){
  var txt = 'Are you sure you want to logout?';

  $.prompt(txt,{
    buttons:{Logout:true, Cancel:false},
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
    });

  });
    
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
	                   url: 'calendar/php/eventsController.php',
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
                   url: 'calendar/php/eventsController.php',
                   data: dataString,
                   type:'POST',
                   success:function(response){
                     //$calendar.weekCalendar("removeUnsavedEvents");
                     //$calendar.weekCalendar("updateEvent", calEvent);
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
	                    url: 'calendar/php/eventsController.php',
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
				url: 'calendar/php/eventsController.php',
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
		
		
	    $('#logoutLink').click(function(){
	        var txt = 'Are you sure you want to logout?';

	        $.prompt(txt,{
	          buttons:{Logout:true, Cancel:false},
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
	          });

	        });
	    
	});//end document ready function
