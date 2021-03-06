<?php
    session_start();
    require_once 'th.php';
    require_once 'user.php';
    require_once 'userbranch.php';
    require_once 'userzone.php';
    $userObj = getUser($_SESSION['LOGGED_USER_ID']);
    $thList = null;
    /*if($userObj->user_level == 'Zone Level'){
        $userZoneObj = getZoneInfoForUser($userObj->id);
        $thList = getAllThsModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
    }else{
        $userBranchObj = getBranchInfoForUser($userObj->id);
        $thList = getAllThsModifiedByUsingUserLevel('Branch Level', $userBranchObj->branch_id);
    }*/
    $thList = getAllThsModifiedBy($_SESSION['LOGGED_USER_ID']);
?>
<table border="0" width="100%">
    <tr style="background: #ccc">
        <td></td>
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
                    <td></td>
                    <td><?php echo $thRow->th_name; ?></td>
                    <td><a href="#.php" id="<?php echo $thRow->id;?>" class="editThLink">Edit</a></td>
                    <td><a href="#.php" id="<?php echo $thRow->id;?>" class="deleteThLink">Delete</a></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div id="<?php echo $divId;?>"></div>
                    </td>
                </tr>
            <?php
        }//end while loop
    ?>
</table>
<script type="text/javascript">
    $(document).ready(function(){

        $('.editThLink').click(function(){
            var id = $(this).attr('id');
            var divId = "thEditDiv" + id;
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
