<div>
    <?php
        //now display the saved data back to the user...
        //require_once 'dbconnection.php';
        require_once 'risk.php';
        require_once 'th.php';
        
        $riskList = getAllRisks();
        if(!empty($riskList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td>#</td>
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
                            ?>
                            <tr>
                                <td><?php echo $ctr++;?></td>
                                <td><?php echo $th->th_name;?></td>
                                <td><?php echo $riskRow->mg;?></td>
                                <td><?php echo $riskRow->dr;?></td>                                
                                <td><?php echo $riskRow->pr;?></td>
                                <td><?php echo $riskRow->wa;?></td>
                                <td><?php echo $riskRow->rs;?></td>
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