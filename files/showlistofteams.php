<?php
    session_start();
?>
<div>
    <?php
        //now display the saved data back to the user...
        require_once 'dbconnection.php';
        require_once 'team.php';
        require_once 'user.php';
        require_once 'usersubdistrict.php';
        //require_once 'userzone.php';

        $userObj = getUser($_SESSION['LOGGED_USER_ID']);
        $teamList = null;
        if($userObj->user_level == '02'){
            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
            $teamList = getAllTeamsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }else if($userObj->user_level == '01'){
            $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
            $teamList = getAllTeamsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }
        //$teamList = getAllTeamsModifiedBy($_SESSION['LOGGED_USER_ID']);
        //now i need to get the level of the user and the based on that i will have to
        //query the records...
        if(!empty($teamList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td></td>
                        <td>Name</td>
                        <td>Title</td>
                        <td>Organization</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Interest</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    <?php
                        $ctr=1;
                        while($teamRow = mysql_fetch_object($teamList)){
                            ?>
                            <tr>
                                <td></td>
                                <td><?php echo $teamRow->team_name;?></td>
                                <td><?php echo $teamRow->title;?></td>
                                <td><?php echo $teamRow->organization;?></td>
                                <td><?php echo $teamRow->email;?></td>
                                <td><?php echo $teamRow->phone;?></td>
                                <td><?php echo rtrim($teamRow->interest , ',');?></td>
                                <td>
                                    <a href="#.php" class="teamEditLink" id="<?php echo $teamRow->id;?>">Edit</a>
                                </td>
                                <td>
                                    <a href="#.php" class="teamDeleteLink" id="<?php echo $teamRow->id;?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }//end while loop
                    ?>
                </table>
                <div id="teamEditDiv"></div>
            <?php
        }
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.teamEditLink').click(function(){
            var id = $(this).attr('id');
            $('#teamEditDiv').load('files/showeditfieldsofthisteam.php?id='+id);
        });

        $('.teamDeleteLink').click(function(){
            var id = $(this).attr('id');
            var dataString = "id="+id;
            if(window.confirm('Are you sure you want to delete this team?')){
                $.ajax({
                    url: 'files/deleteteam.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        showListOfTeams();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });

        function showListOfTeams(){
            $('#subDetailDiv').load('files/showlistofteams.php');
        }
    });//end document.ready function
</script>
