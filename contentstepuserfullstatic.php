<div class="content" id='step1Content'>
  <!--to be replaced when the next button is clicked-->
  <div id="topcontain">
    <div id="titlearea">

      <h2></h2>
      <h3></h3>
    </div>
    <div id="resourcearea">
      <ul>
        <li class="sb-toggle-right" id="step4_4"><img src="images/resource_icon.png" alt="Resource Toolkit" /> Resource Toolkit</li>
      </ul>
    </div>
  </div>
  <div class="col-half left">

  </div><!-- /col-half --><!-- /col-half -->
  <?php
  require_once 'importjsscripts.php';
  ?>
  <div class="col-half left">
    <?php
    require 'files/showusermanagementlist.php';
    ?>
  </div>
  <!--end to be replaced content-->
</div> <!-- /content -->
<script type='text/javascript'>
$(document).ready(function(){

  $('#rightArrowButton').click(function(){
  window.location.replace('step5.php');
});

$('#leftArrowButton').click(function(){  
window.location.replace('step4_3fullstatic.php');
});

});//end document.ready function
</script>
