<div class="content" id='step1Content'>
  <!--to be replaced when the next button is clicked-->
  <div id="topcontain">
    <div id="titlearea">
      <h1 id='currentPageTag'>Step 3-2</h1>
      <h2></h2>
      <h3></h3>
    </div>
    <div id="resourcearea">
      <ul>
        <li class="sb-toggle-right" id="step3_2"><img src="images/resource_icon.png" alt="Resource Toolkit" /> Resource Toolkit</li>
      </ul>
    </div>
  </div>
  <div class="col-half left">
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
  </div><!-- /col-half --><!-- /col-half -->
  <div class="col-half left">
    <?php
      require_once 'importjsscripts.php';
    ?>
    <div id="errorDiv"></div>
    <?php
      require_once 'files/showlistofthselectioncheckboxes.php';
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
  window.location.replace('step3_3fullstatic.php');
  //come back to this and do it with Array version...
  /*var selectedCheckBoxesIdDataString = "";
  var ctr = 1;
  $('input:checkbox.checkBoxSelection').each(function () {
    var checkBoxName = "thCheckBox" + ctr;
    if( this.checked ){
      selectedCheckBoxesIdDataString += checkBoxName +"="+ $(this).val()+"&";
      ctr++;
    }
  });
  selectedCheckBoxesIdDataString+="ctr="+(ctr-1);
  $('#step3Content').load('showstep3_3content.php?'+selectedCheckBoxesIdDataString);*/
});

$('#leftArrowButton').click(function(){
  /*var currentPageTag = $('#currentPageTag').html();
  if(currentPageTag === 'Intro Two'){
  window.location.replace("intro1.php");
}else if(currentPageTag === 'Intro Three'){
window.location.replace("intro2.php");
}*/
window.location.replace('step3.php');
});

});//end document.ready function
</script>
