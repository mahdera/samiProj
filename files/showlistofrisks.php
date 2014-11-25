<?php
    session_start();
?>
<div>
    <?php
        //now display the saved data back to the user...
        //require_once 'dbconnection.php';
        require_once 'risk.php';
        require_once 'th.php';
        require_once 'user.php';
        require_once 'usersubdistrict.php';
        //require_once 'userzone.php';

        $userObj = getUser($_SESSION['LOGGED_USER_ID']);
        $riskList = null;
        /*if($userObj->user_level == 'Zone Level'){
            $userZoneObj = getZoneInfoForUser($userObj->id);
            $riskList = getAllRisksModifiedByUsingUserLevel('Zone Level', $userZoneObj->zone_id);
        }*/
        if($userObj->user_level == '02'){
            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
            $riskList = getAllRisksModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
        }
        //$riskList = getAllRisksModifiedBy($_SESSION['LOGGED_USER_ID']);
        if(!empty($riskList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td>Th</td>
                        <td>MG</td>
                        <td>DR</td>
                        <td>PR</td>
                        <td>WA</td>
                        <td>RS</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    <?php
                        $ctr=1;
                        while($riskRow = mysql_fetch_object($riskList)){
                            $th = getTh($riskRow->th_id);
                            $divId = "riskEditDiv" . $riskRow->id;
                            ?>
                            <tr>
                                <td><?php echo $th->th_name;?></td>
                                <td><?php echo $riskRow->mg;?></td>
                                <td><?php echo $riskRow->dr;?></td>
                                <td><?php echo $riskRow->pr;?></td>
                                <td><?php echo $riskRow->wa;?></td>
                                <td><?php echo $riskRow->rs;?></td>
                                <td><a href="#.php" class="riskEditLink" id="<?php echo $riskRow->id;?>">Edit</a></td>
                                <td><a href="#.php" class="riskDeleteLink" id="<?php echo $riskRow->id;?>">Delete</a></td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <div id="<?php echo $divId;?>"></div>
                                </td>
                            </tr>
                            <?php
                            $ctr++;
                        }//end while loop
                    ?>
                </table>
            <?php
        }
?>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('.riskEditLink').click(function(){
            var id = $(this).attr('id');
            var divId = "riskEditDiv" + id;
            $('#'+divId).load('files/showeditfiedlsofrisk.php?id='+id);
        });

        $('.riskDeleteLink').click(function(){
            var id = $(this).attr('id');
            if(window.confirm('Are you sure you want to delete this risk record?')){
                var dataString = "id="+id;
                $.ajax({
                    url: 'files/deleterisk.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        showListOfRisks();
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });

        function showListOfRisks(){
            $('#subDetailDiv').load('files/showlistofrisks.php');
        }

    });//end document.ready function
</script>
