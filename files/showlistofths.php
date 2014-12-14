<?php
    session_start();
    require_once 'th.php';
    require_once 'user.php';
    require_once 'usersubdistrict.php';
    //require_once 'userzone.php';
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $thList = null;
    /*if($userObj->user_level == 'Zone Level'){
        $userZoneObj = getZoneInfoForUser($userObj->id);
        $thList = getAllThsModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
    }*/
    if($userObj->user_level == '02'){
        $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
        $thList = getAllThsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
    }else if($userObj->user_level == '01'){
        $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
        if($userObj != null){
          $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
          $thList = getAllThsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }
    }
    //$thList = getAllThsModifiedBy($_SESSION['LOGGED_USER_ID']);
    if(!empty($thList) && mysql_num_rows($thList)){
?>
<table border="1" width="100%" rules="all">
    <tr style="background: #ccc">
        <td>Th Name</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    <?php
        $ctr=1;
        while($thRow = mysql_fetch_object($thList)){
            $divId = "thEditDiv" . $thRow->id;
            ?>
                <tr>
                    <td><?php echo stripslashes($thRow->th_name); ?></td>
                    <td align="middle"><a href="#.php" id="<?php echo $thRow->id;?>" class="editThLink"><img src="images/edit.png" border="0" align="absmiddle"/></a></td>
                    <td align="middle"><a href="#.php" id="<?php echo $thRow->id;?>" class="deleteThLink"><img src="images/delete.png" border="0" align="absmiddle"/></a></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="<?php echo $divId;?>"></div>
                    </td>
                </tr>
            <?php
        }//end while loop
    ?>
</table>
<?php
  }else{
    ?>
      <div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
    <?php
  }
?>
<script type="text/javascript">
    $(document).ready(function(){

        $('.editThLink').click(function(){
            var id = $(this).attr('id');
            var divId = "thEditDiv" + id;
            alert(divId);
            $('#'+divId).load('files/showeditfieldsofth.php?id='+id);
        });

        $('.deleteThLink').click(function(){
            var id = $(this).attr('id');
            if(window.confirm('Are you sure you want to delete this Th?')){
                var dataString = "id="+id;
                $.ajax({
                    url: 'files/deleteth.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        showListOfThs();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });

        function showListOfThs(){
            $('#subDetailDiv').load('files/showlistofths.php');
        }

    });//end document.ready function
</script>
