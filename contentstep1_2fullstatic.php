<div class="content" id='step1Content'>
  <!--to be replaced when the next button is clicked-->
  <div id="topcontain">
    <div id="titlearea">
      <h1 id='currentPageTag'>Step 1-2</h1>
      <h2></h2>
      <h3></h3>
    </div>
    <div id="resourcearea">
      <ul>
        <li class="sb-toggle-right" id="step1_2"><img src="images/resource_icon.png" alt="Resource Toolkit" /> Resource Toolkit</li>
      </ul>
    </div>
  </div>
  <div class="col-half left">
    <?php
      require_once 'teammanagementform.php';
    ?>
  </div><!-- /col-half --><!-- /col-half -->
  <!--end to be replaced content-->
</div> <!-- /content -->
<script type='text/javascript'>
$(document).ready(function(){

  $('#rightArrowButton').click(function(){
    /*var currentPageTag = $('#currentPageTag').html();
    if(currentPageTag === 'Step 1-1'){
      $('#step1Content').load('showstep1_2content.php');
    }*/
    window.location.replace('step1_3fullstatic.php');
  });

  $('#leftArrowButton').click(function(){
    /*var currentPageTag = $('#currentPageTag').html();
    if(currentPageTag === 'Intro Two'){
      window.location.replace("intro1.php");
    }else if(currentPageTag === 'Intro Three'){
      window.location.replace("intro2.php");
    }*/
    window.location.replace('step1.php');
  });

});//end document.ready function
</script>