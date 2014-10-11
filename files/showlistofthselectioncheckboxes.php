<div>
    <?php
        //now display the saved data back to the user...
        //require_once 'dbconnection.php';
        require_once 'risk.php';
        require_once 'th.php';
        
        $thList = getAllThs();
        if(!empty($thList)){
            ?>
                <table border="0" width="100%">
                    <tr style="background: #ccc">
                        <td>#</td>
                        <td>Th</td>                        
                        <td>Select</td>
                    </tr>
                    <?php
                        $ctr=1;
                        while($thRow = mysql_fetch_object($thList)){
                            ?>
                            <tr>
                                <td><?php echo $ctr;?></td>
                                <td><?php echo $thRow->th_name;?></td>                                
                                <td align="center">
                                    <?php
                                        $chkName = "chk_" . $thRow->id;
                                    ?>
                                    <input type="checkbox" name="<?php echo $chkName;?>" id="<?php echo $chkName;?>" value="<?php echo $thRow->id;?>"/>
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
        
        
        
    });//end document.ready function
</script>