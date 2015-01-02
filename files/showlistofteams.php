  <?php
    @session_start();
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
        //var_dump($userObj);
        $teamList = null;
        if($userObj->user_level == '02'){
            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
            if($userSubDistrictObj != null)
              $teamList = getAllTeamsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }else if($userObj->user_level == '01'){
            $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
            if($userObject != null){
              $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
              $teamList = getAllTeamsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
            }
        }
        //$teamList = getAllTeamsModifiedBy($_SESSION['LOGGED_USER_ID']);
        //now i need to get the level of the user and the based on that i will have to
        //query the records...
        if(!empty($teamList) && mysql_num_rows($teamList)){
            ?>
                <table border="1" width="100%" rules="all">
                    <tr style="background: #ccc">
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
                                <td><?php echo stripslashes($teamRow->team_name);?></td>
                                <td><?php echo stripslashes($teamRow->title);?></td>
                                <td><?php echo stripslashes($teamRow->organization);?></td>
                                <td><?php echo stripslashes($teamRow->email);?></td>
                                <td><?php echo stripslashes($teamRow->phone);?></td>
                                <td>
                                    <?php
                                        $trimmedString = rtrim($teamRow->interest , ',');
                                        $myArray = explode(',', $trimmedString);
                                        for($i=0; $i < count($myArray); $i++){
                                          echo $myArray[$i] . "<br/>";
                                        }//end for...loop
                                    ?>
                                </td>
                                <td align="middle">
                                    <a href="#.php" class="teamEditLink" id="<?php echo $teamRow->id;?>">Edit</a>
                                </td>
                                <td align="middle">
                                    <a href="#.php" class="teamDeleteLink" id="<?php echo $teamRow->id;?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }//end while loop
                    ?>
                </table>
                <div id="teamEditDiv"></div>
            <?php
        }else{
          ?>
            <div class="notify notify-yellow"><span class="symbol icon-info"></span> No record found!</div>
          <?php
        }
    ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.teamEditLink').click(function(){
            var id = $(this).attr('id');
            $('html, body').animate({
              'scrollTop' : $("#teamEditDiv").position().top
            });
            $('#teamEditDiv').load('files/showeditfieldsofthisteam.php?id='+id, {noncache: new Date().getTime()} );
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
            $('#subDetailDiv').load('files/showlistofteams.php', {noncache: new Date().getTime()});
        }
    });//end document.ready function
</script>
