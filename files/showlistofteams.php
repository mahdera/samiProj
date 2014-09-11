<div>
    <?php
        //now display the saved data back to the user...
        require_once 'dbconnection.php';
        require_once 'team.php';
        $teamList = getAllTeams();
        if(!empty($teamList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td>#</td>
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
                                <td><?php echo $ctr++;?></td>
                                <td><?php echo $teamRow->team_name;?></td>
                                <td><?php echo $teamRow->title;?></td>
                                <td><?php echo $teamRow->organization;?></td>
                                <td><?php echo $teamRow->email;?></td>
                                <td><?php echo $teamRow->phone;?></td>
                                <td><?php echo $teamRow->interest;?></td>
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