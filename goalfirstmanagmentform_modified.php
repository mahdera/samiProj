<?php
  require_once 'files/th.php';
  require_once 'files/fn.php';
  require_once 'files/user.php';
  require_once 'files/usersubdistrict.php';
  require_once 'files/goalfirstth.php';

  $fnList = null;
  $selectedThIdArray = null;
  @session_start();
  if(isset($_SESSION['SELECTED_THS'])){
    $selectedThIdArray = $_SESSION['SELECTED_THS'];
  }
?>
<h1>Goal First Management</h1>
<!--here comes the table that sami wanted so very much -->
<table border="1" width="100%" rules="all">
    <tr style="background:#eee">
      <td>Th</td>
      <td>Actions</td>
    </tr>
    <?php
      if(!empty($thList)){
        while($thObj = mysql_fetch_object($thList)){
          $divId = "goalFirstDetailDiv" . $thObj->id;
          ?>
            <tr>
              <td><?php echo $thObj->th_name;?></td>
              <td>
                  Add
                  |
                  Edit
                  |
                  Delete
                  |
                  Close
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div id="<?php echo $divId;?>"></div>
              </td>
            </tr>
          <?php
        }//end while loop
      }else{
        for($i=0; $i < count($selectedThIdArray); $i++){
          $thObj = getTh($selectedThIdArray[$i]);
          $divId = "goalFirstDetailDiv" . $thObj->id;
          ?>
            <tr>
              <td width="60%"><?php echo $thObj->th_name;?></td>
              <td>
                  <?php
                    if(!doesThisThHasGoalFirstSavedForIt($thObj->id)){
                  ?>
                    <a href="#.php" id="<?php echo $thObj->id;?>" class="addGoalFirstDetailClass">Add</a>
                  <?php
                    }else{
                  ?>
                    <a href="#.php" id="<?php echo $thObj->id;?>" class="openGoalFirstDetailForEditClass">Edit</a>
                  <?php
                    }
                  ?>
                  <?php
                    if(doesThisThHasGoalFirstSavedForIt($thObj->id)){
                  ?>
                    |
                    <a href="#.php" id="<?php echo $thObj->id;?>" class="deleteGoalFirstDetailClass">Delete</a>
                  <?php
                    }
                  ?>
                  |
                  <a href="#.php" id="<?php echo $thObj->id;?>" class="closeActionFormClass">Close</a>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div id="<?php echo $divId;?>"></div>
              </td>
            </tr>
          <?php
        }//end for...loop
      }
    ?>
</table>

<div id="subDetailDiv"></div>
<script type="text/javascript">

  $(document).ready(function(){

    $('.openActionFormClass').click(function(){
      var idVal = $(this).attr('id');
      //now create the div element using the id you got in here...
      var divId = "actionDiv" + idVal;
      $('#' + divId).load('files/showgoalfirstdetailhere.php?thId='+idVal, {noncache: new Date().getTime()});
    });

    $('.closeActionFormClass').click(function(){
      var idVal = $(this).attr('id');
      var divId = "goalFirstDetailDiv" + idVal;
      $('#' + divId).html('');
    });

    $('.addGoalFirstDetailClass').click(function(){
      var idVal = $(this).attr('id');
      var divId = "goalFirstDetailDiv" + idVal;
      var selectedThIdArray = <?php echo json_encode($selectedThIdArray);?>;
      for(var i=0; i<selectedThIdArray.length;i++){
        var clearDivId = "goalFirstDetailDiv" + selectedThIdArray[i];
        $('#'+clearDivId).html('');
      }//end for...loop
      $('#'+divId).load('files/showaddgoalfirstdetailform.php?thId='+idVal, {noncache: new Date().getTime()});
    });

    $('.openGoalFirstDetailForEditClass').click(function(){
      var idVal = $(this).attr('id');
      var divId = "goalFirstDetailDiv" + idVal;
      var selectedThIdArray = <?php echo json_encode($selectedThIdArray);?>;
      for(var i=0; i<selectedThIdArray.length;i++){
          var clearDivId = "goalFirstDetailDiv" + selectedThIdArray[i];
          $('#'+clearDivId).html('');
      }//end for...loop
      $('#' + divId).load('files/showgoalfirstdetailhereforedit.php?thId='+idVal, {noncache: new Date().getTime()});
    });

    $('.deleteGoalFirstDetailClass').click(function(){
      if(window.confirm('Are you sure you want to delete this record?')){
        var idVal = $(this).attr('id');
        var divId = "subDetailDiv";
        var dataString = "thId=" + idVal;
        $.ajax({
          url: 'files/deletegoalfirst.php',
          data: dataString,
          type:'POST',
          success:function(response){
            $('#goalFirstDivToRefresh').load('goalfirstmanagmentform_modified.php', {noncache: new Date().getTime()});
          },
          error:function(error){
            alert(error);
          }
        });
      }
    });

  });//end document.ready function

</script>
