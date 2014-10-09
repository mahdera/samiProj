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
                        <td>Select</td>
                    </tr>
                    <?php
                        $ctr=1;
                        while($riskRow = mysql_fetch_object($riskList)){
                            $th = getTh($riskRow->th_id);
                            $divId = "riskEditDiv" . $riskRow->id;
                            ?>
                            <tr>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo $th->th_name;?></td>
                                <td><?php echo $riskRow->mg;?></td>
                                <td><?php echo $riskRow->dr;?></td>                                
                                <td><?php echo $riskRow->pr;?></td>
                                <td><?php echo $riskRow->wa;?></td>
                                <td><?php echo $riskRow->rs;?></td>
                                <td><a href="#.php" class="riskEditLink" id="<?php echo $riskRow->id;?>">Edit</a></td>
                                <td>Delete</td>
                                <td align="center">
                                    <?php
                                        $chkName = "chk_" . $ctr;
                                    ?>
                                    <input type="checkbox" name="<?php echo $chkName;?>" id="<?php echo $chkName;?>" value="<?php echo $riskRow->th_id;?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
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
        
    });//end document.ready function
</script>