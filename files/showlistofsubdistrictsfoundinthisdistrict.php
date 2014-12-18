<?php
  session_start();
  require_once 'subdistrict.php';

  $districtId = $_GET['districtId'];
  //$subDistrictList = getAllSubDistrictsOfThisDistrict($districtId);
  //the subDistrictList should be populated with subdistricts that has at least one or more users in it.
  $subDistrictList = getAllSubDistrictsOfThisDistrictHavingUsersUnderIt($districtId);
?>
<select name="slctsubdistrictselection" id="slctsubdistrictselection" style="width:15%">
  <option value="" selected="selected">--Select--</option>
  <?php
    while($subDistrictRow = mysql_fetch_object($subDistrictList) ){
      if( !empty($_SESSION['SUB_DISTRICT_ID']) ){
        if($_SESSION['SUB_DISTRICT_ID'] == $subDistrictRow->id){
          ?>
            <option value="<?php echo $subDistrictRow->id;?>" selected="selected"><?php echo stripslashes($subDistrictRow->display_name);?></option>
          <?php
        }else{
          ?>
            <option value="<?php echo $subDistrictRow->id;?>"><?php echo stripslashes($subDistrictRow->display_name);?></option>
          <?php
        }
      }else{
        ?>
          <option value="<?php echo $subDistrictRow->id;?>"><?php echo stripslashes($subDistrictRow->display_name);?></option>
        <?php
      }
    }//end while loop
  ?>
</select>
<script type="text/javascript">
  $(document).ready(function(){
    $('#slctsubdistrictselection').change(function(){
      var subDistrictId = $(this).val();
      if(subDistrictId !== ""){
        var dataString = "subDistrictId="+subDistrictId;
        $.ajax({
          url: 'initializepagewithselectedsubdistrictidfordistrictadmin.php',
          data: dataString,
          type:'POST',
          success:function(response){
            window.location = 'intro1.php';
          },
          error:function(error){
            alert(error);
          }
        });
      }
    });
  });//end document.ready function
</script>
