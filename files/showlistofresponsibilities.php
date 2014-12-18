<div>
    <?php
        //now display the saved data back to the user...
        //require_once 'dbconnection.php';
        require_once 'responsibility.php';
        require_once 'team.php';

        $responsibilityList = getAllResponsibilities();
        if(!empty($responsibilityList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td>#</td>
                        <td>Team</td>
                        <td>Role</td>
                        <td>Responsibility</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    <?php
                        $ctr=1;
                        while($responsibilityRow = mysql_fetch_object($responsibilityList)){
                            $team = getTeam($responsibilityRow->team_id);
                            ?>
                            <tr>
                                <td><?php echo $ctr++;?></td>
                                <td><?php echo stripslashes($team->team_name);?></td>
                                <td><?php echo stripslashes($responsibilityRow->role);?></td>
                                <td><?php echo stripslashes($responsibilityRow->responsibility);?></td>
                                <td>
                                    <a href="#.php" id="<?php echo $responsibilityRow->id;?>" class="editLink">Edit</a>
                                </td>
                                <td>
                                    Delete
                                </td>
                            </tr>
                            <?php
                                $divId = "responsibilityEditDiv" . $responsibilityRow->id;
                            ?>
                            <tr>
                                <td colspan="6">
                                    <div id="<?php echo $divId;?>"></div>
                                </td>
                            </tr>
                            <?php
                        }//end while loop
                    ?>
                </table>
            <?php
        }
?>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('.editLink').click(function(){
            var id = $(this).attr('id');
            var divId = "responsibilityEditDiv" + id;
            $('#'+divId).load('files/showresponsibilityeditform.php?id='+id);
        });

    });//end document.ready function
</script>
