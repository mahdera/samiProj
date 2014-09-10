<div>
    <?php
        //now display the saved data back to the user...
        //require_once 'dbconnection.php';
        require_once 'assessment.php';
        require_once 'th.php';
        
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
                                <td><?php echo $team->team_name;?></td>
                                <td><?php echo $responsibilityRow->role;?></td>
                                <td><?php echo $responsibilityRow->responsibility;?></td>                                
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <?php
                        }//end while loop
                    ?>
                </table>
            <?php
        }
    ?>
</div>