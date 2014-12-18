<link rel='stylesheet' type='text/css' href='event_calendar/libs/css/smoothness/jquery-ui-1.8rc3.custom.css' />
<link rel='stylesheet' type='text/css' href='event_calendar/css/jquery.weekcalendar.css' />
<link rel='stylesheet' type='text/css' href='event_calendar/css/calendar.css' />
<link rel='stylesheet' type='text/css' href='event_calendar/css/reset.css' />
<link rel='stylesheet' type='text/css' href='event_calendar/css/engine.css' />

<script type='text/javascript' src="event_calendar/libs/jquery-1.4.2.min.js"></script>
<script type='text/javascript' src='event_calendar/libs/jquery-ui-1.8rc3.custom.min.js'></script>
<script type='text/javascript' src='event_calendar/js/jquery.weekcalendar.js'></script>
<script type='text/javascript' src='event_calendar/js/engine.js'></script>

<script type="text/javascript">
  $(document).ready(function(){
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
  });//end document.ready function
</script>
