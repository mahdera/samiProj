<?php
  require_once 'files/th.php';
  require_once 'files/fn.php';
  require_once 'files/user.php';
  require_once 'files/usersubdistrict.php';
  require_once 'files/goalfirstth.php';
  //@session_start();
  $userObj = getUser($_SESSION['LOGGED_USER_ID']);
  $fnList = null;
  $selectedThIdArray = null;

  if(isset($_SESSION['SELECTED_THS'])){
    $selectedThIdArray = $_SESSION['SELECTED_THS'];
  }

  if($userObj->user_level == '02'){
    $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
    $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
  }else if($userObj->user_level == '01'){
    $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
    if(!empty($userObj)){
      $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
      $fnList = getAllFnsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }
  }
?>
<h1>Add Goal First</h1>
<a href="#.php" id="showGoalFirstManagementFormLinkId">Show</a>
|
<a href="#.php" id="hideGoalFirstManagementFormLinkId">Hide</a>

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
              <td><?php echo $thObj->th_name;?></td>
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
                  |
                  <a href="#.php" id="<?php echo $thObj->id;?>" class="deleteGoalFirstDetailClass">Delete</a>
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

<hr/>
<div id="subDetailDiv"></div>
<script type="text/javascript">

  $(document).ready(function(){

    $('#goalFirstManagementForm').hide();
    //$('#subDetailDiv').hide();

    $('#showGoalFirstManagementFormLinkId').click(function(){
      $('#goalFirstManagementForm').show('slow');
      //$('#subDetailDiv').show('slow');
    });

    $('#hideGoalFirstManagementFormLinkId').click(function(){
      $('#goalFirstManagementForm').hide('slow');
      //$('#subDetailDiv').hide('slow');
    });

    //showListOfGoalFirsts();

    $('#slctth').change(function(){
      var thId = $(this).val();
      if(thId != ''){
        var dataString = "thId="+thId;
        $.ajax({
          url: 'files/hasthisthbeenusedbefore.php',
          data: dataString,
          type:'POST',
          success:function(response){
            $('#thDuplicationErrorDiv').html(response);
            if(response !== ""){
              $('#btnsave').hide();
              $('#goalFirstManagementForm').hide('slow');
              //$('#subDetailDiv').hide('slow');
            }else{
              $('#btnsave').show();
              $('#goalFirstManagementForm').show('slow');
              //$('#subDetailDiv').show('slow');
            }
          },
          error:function(error){
            alert(error);
          }
        });
      }
    });

    $('#btnsave').click(function(){
      //first get the static form values...
      var th = $('#slctth').val();
      var g1 = $('#txtg1').val();
      var g1Fn = $('#slctg1fn').val();
      var g1Obj1 = $('#txtg1obj1').val();
      var g1Fn1 = $('#slctg1fn1').val();
      var g2 = $('#txtg2').val();
      var g2Fn = $('#slctg2fn').val();
      var g2Obj1 = $('#txtg2obj1').val();
      var g2Fn1 = $('#slctg2fn1').val();
      var g3 = $('#txtg3').val();
      var g3Fn = $('#slctg3fn').val();
      var g3Obj1 = $('#txtg3obj1').val();
      var g3Fn1 = $('#slctg3fn1').val();
      var isBlank = false;

      if(th !== "" && g1 !== "" && g1Fn !== "" && g1Obj1 !== "" && g1Fn1 !== "" && g2 !== "" && g2Fn !== "" &&
      g2Obj1 !== "" && g2Fn1 !== "" && g3 !== "" && g3Fn !== "" && g3Obj1 !== "" && g3Fn1 !== ""){
        var dataString = "th="+th+"&g1="+encodeURIComponent(g1)+"&g1Fn="+encodeURIComponent(g1Fn)+"&g1Obj1="+encodeURIComponent(g1Obj1)+"&g1Fn1="+encodeURIComponent(g1Fn1)+"&g2="+encodeURIComponent(g2)+
        "&g2Fn="+encodeURIComponent(g2Fn)+"&g2Obj1="+encodeURIComponent(g2Obj1)+"&g2Fn1="+encodeURIComponent(g2Fn1)+"&g3="+encodeURIComponent(g3)+"&g3Fn="+encodeURIComponent(g3Fn)+"&g3Obj1="+encodeURIComponent(g3Obj1)+"&g3Fn1="+encodeURIComponent(g3Fn1);
        //now I need to count how many new forms are added under G1, G2 and G3.
        var numItemsG1 = $('.g1Obj').length;
        var numItemsG2 = $('.g2Obj').length;
        var numItemsG3 = $('.g3Obj').length;

        for(var i = 1; i <= numItemsG1; i++){
          var g1ObjTextBoxId = "txtg1obj" + i;
          var g1ObjTextBoxValue = $('#' + g1ObjTextBoxId).val();
          var g1FnSelectBoxId = "slctg1fn" + i;
          var g1FnSelectBoxValue = $('#' + g1FnSelectBoxId).val();
          if(g1ObjTextBoxValue !== "" && g1FnSelectBoxValue !== ""){
            dataString += "&" + g1ObjTextBoxId + "=" + encodeURIComponent(g1ObjTextBoxValue) + "&" + g1FnSelectBoxId + "=" + encodeURIComponent(g1FnSelectBoxValue);

          }else{
            isBlank = true;
          }
        }//end for loop i

        //now do the same thing for g2...
        for(var j = 1; j <= numItemsG2; j++){
          var g2ObjTextBoxId = "txtg2obj" + j;
          var g2ObjTextBoxValue = $('#' + g2ObjTextBoxId).val();
          var g2FnSelectBoxId = "slctg2fn" + j;
          var g2FnSelectBoxValue = $('#' + g2FnSelectBoxId).val();
          if(g2ObjTextBoxValue !== "" && g2FnSelectBoxValue !== ""){
            dataString += "&" + g2ObjTextBoxId + "=" + encodeURIComponent(g2ObjTextBoxValue) + "&" + g2FnSelectBoxId + "=" + encodeURIComponent(g2FnSelectBoxValue);

          }else{
            isBlank = true;
          }
        }//end for loop j

        //now do the same thing for g3...
        for(var k = 1; k <= numItemsG3; k++){
          var g3ObjTextBoxId = "txtg3obj" + k;
          var g3ObjTextBoxValue = $('#' + g3ObjTextBoxId).val();
          var g3FnSelectBoxId = "slctg3fn" + k;
          var g3FnSelectBoxValue = $('#' + g3FnSelectBoxId).val();
          if(g3ObjTextBoxValue !== "" && g3FnSelectBoxValue !== ""){
            dataString += "&" + g3ObjTextBoxId + "=" + encodeURIComponent(g3ObjTextBoxValue) + "&" + g3FnSelectBoxId + "=" + encodeURIComponent(g3FnSelectBoxValue);

          }else{
            isBlank = true;
          }
        }//end for loop j

        //by now I have everything I need. So make sure the isBlank variable is not true and go ahead and save the information to the database.
        if(!isBlank){
          dataString += "&numItemsG1="+numItemsG1+"&numItemsG2="+numItemsG2+"&numItemsG3="+numItemsG3;
          $.ajax({
            url: 'files/savegoalfirst.php',
            data: dataString,
            type:'POST',
            success:function(response){
              clearFormInputField();
              showListOfGoalFirsts();
              $('#goalFirstManagementForm').hide('slow');
            },
            error:function(error){
              alert(error);
            }
          });
        }else{
          alert('Missing data value. You are required to enter all the data values!');
        }

      }else{
        alert('Please enter all the necessary data values!');
      }

    });

    function clearFormInputField(){
      $('#goalFirstManagementForm')[0].reset();
      $('.added').remove();
    }

    function showListOfGoalFirsts(){
      $('#subDetailDiv').load('files/showlistofgoalfirstsmodified.php');
    }

    $('#slctg1fn').change(function(){
      var fnVal = $(this).val();
      if(fnVal === "other"){
        $('#g1fnOtherDiv').load('files/showotherfnentryform.php');
      }else{
        $('#g1fnOtherDiv').html('');
      }
    });

    $('#slctg1fn1').change(function(){
      var fnVal = $(this).val();
      if(fnVal === "other"){
        $('#g1fnObjOtherDiv').load('files/showotherfnentryformforg1fn1.php');
      }else{
        $('#g1fnObjOtherDiv').html('');
      }
    });

    $('#slctg2fn').change(function(){
      var fnVal = $(this).val();
      if(fnVal === "other"){
        $('#g2fnOtherDiv').load('files/showg2otherfnentryform.php');
      }else{
        $('#g2fnOtherDiv').html('');
      }
    });

    $('#slctg2fn1').change(function(){
      var fnVal = $(this).val();
      if(fnVal === "other"){
        $('#g2fnObjOtherDiv').load('files/showg2otherfnentryformg2fn1.php');
      }else{
        $('#g2fnObjOtherDiv').html('');
      }
    });

    $('#slctg3fn').change(function(){
      var fnVal = $(this).val();
      if(fnVal === "other"){
        $('#g3fnOtherDiv').load('files/showg3otherfnentryform.php');
      }else{
        $('#g3fnOtherDiv').html('');
      }
    });

    $('#slctg3fn1').change(function(){
      var fnVal = $(this).val();
      if(fnVal === "other"){
        $('#g3fnObjOtherDiv').load('files/showg3otherfnentryformg3fn1.php');
      }else{
        $('#g3fnObjOtherDiv').html('');
      }
    });

    $('#addMoreG1ObjFnLink').click(function(){
      var numItems = $('.g1Obj').length;
      var dataString = "numItems="+numItems;

      $.ajax({
        url: 'files/showmoreg1objfnform.php',
        data: dataString,
        type:'POST',
        success:function(response){
          var trId = "addMoreG1ObjFn" + numItems;
          $('#'+trId).after(response);
        },
        error:function(error){
          alert(error);
        }
      });

    });

    $('#addMoreG2ObjFnLink').click(function(){
      var numItems = $('.g2Obj').length;
      var dataString = "numItems="+numItems;

      $.ajax({
        url: 'files/showmoreg2objfnform.php',
        data: dataString,
        type:'POST',
        success:function(response){
          var trId = "addMoreG2ObjFn" + numItems;
          $('#' + trId).after(response);
        },
        error:function(error){
          alert(error);
        }
      });

    });

    $('#addMoreG3ObjFnLink').click(function(){
      var numItems = $('.g3Obj').length;
      var dataString = "numItems="+numItems;

      $.ajax({
        url: 'files/showmoreg3objfnform.php',
        data: dataString,
        type:'POST',
        success:function(response){
          var trId = "addMoreG3ObjFn" + numItems;
          $('#'+trId).after(response);
        },
        error:function(error){
          alert(error);
        }
      });

    });

    $('#removeG1ThRowLink').click(function(){
      var numItems = $('.g1Obj').length;
      if(numItems > 1){
        var thRowId = 'addMoreG1ObjFn'+numItems;
        $('#'+thRowId).remove();
      }
    });

    $('#removeG2ThRowLink').click(function(){
      var numItems = $('.g2Obj').length;
      if(numItems > 1){
        var thRowId = 'addMoreG2ObjFn'+numItems;
        $('#'+thRowId).remove();
      }
    });

    $('#removeG3ThRowLink').click(function(){
      var numItems = $('.g3Obj').length;
      if(numItems > 1){
        var thRowId = 'addMoreG3ObjFn'+numItems;
        $('#'+thRowId).remove();
      }
    });

    $('.fnRefreshSpin').click(function(){
      var idVal = $(this).attr('id');
      var selectControlName = "slct" + idVal;
      //first clear the current contents...
      jQuery('#'+selectControlName).children().remove();
      //now you have the control name defined in here, reload the content again...
      $.getJSON('files/reloadfunctionselectcontrolwithlatestdata.php', function(data) {
        console.log("succ");
      })

      .done(function( data ) {
        $.each( data.functions, function( i, item ) {
          //console.log(item.fnName);
          jQuery('#'+selectControlName).append("<option value='"+item.fnId+"'>"+item.fnName+"</option>");
        });
        jQuery('#'+selectControlName).append("<option value='other'>other</option>");
      });
    });

    $('.openActionFormClass').click(function(){
      var idVal = $(this).attr('id');
      //now create the div element using the id you got in here...
      var divId = "actionDiv" + idVal;
      $('#' + divId).load('files/showgoalfirstdetailhere.php?thId='+idVal);
    });

    $('.closeActionFormClass').click(function(){
      var idVal = $(this).attr('id');
      var divId = "goalFirstDetailDiv" + idVal;
      $('#' + divId).html('');
    });

    $('.addGoalFirstDetailClass').click(function(){
      var idVal = $(this).attr('id');
      var divId = "goalFirstDetailDiv" + idVal;
      //Here I need to close any open div so that I don't redeclare the forms to have a unique control names...
      //read about how to change php array to JavaScript array or something along that line of tought...
      var selectedThIdArray = "<?php echo jsonencode($selectedThIdArray);?>";
      alert(selectedThIdArray);
      //$('#'+divId).load('files/showaddgoalfirstdetailform.php?thId='+idVal);
    });

    $('.openGoalFirstDetailForEditClass').click(function(){
      var idVal = $(this).attr('id');
      //var divId = "actionDiv" + idVal;
      var divId = "goalFirstDetailDiv" + idVal;
      alert(divId);
      $('#' + divId).load('files/showgoalfirstdetailhereforedit.php?thId='+idVal);
    });

    $('.deleteGoalFirstDetailClass').click(function(){
      if(window.confirm('Are you sure you want to delete this record?')){
        var idVal = $(this).attr('id');
        var divId = "subDetailDiv";
        var dataString = "goalFirstThId=" + idVal;
        $.ajax({
          url: 'files/deletegoalfirst.php',
          data: dataString,
          type:'POST',
          success:function(response){
            $('#'+divId).html(response);
          },
          error:function(error){
            alert(error);
          }
        });
      }
    });

  });//end document.ready function

</script>
