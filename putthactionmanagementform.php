<h2>Th Action</h2>
<?php
    require_once 'files/th.php';
    $thList = getAllThs();
    
    if(!empty($thList)){
        ?>
        <table border="1" width="100%">
            <tr style="background: #CCC">
                <td>Ser.No</td>
                <td>Th</td>
                <td>Action</td>
            </tr>
            <?php
                $ctr=1;
                while($thRow = mysql_fetch_object($thList)){
                    $divId = "actionDiv" . $thRow->id;
                    ?>
                    <tr>
                        <td><?php echo $ctr;?></td>
                        <td><?php echo $thRow->th_name;?></td>
                        <td>
                            [<a href="#.php" id="<?php echo $thRow->id;?>" class="openActionFormClass">Show Add Action Form</a> | <a href="#.php" id="<?php echo $thRow->id;?>" class="closeActionFormClass">Close Add Action Form</a>]
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
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
<hr/>
<div id="subDetailDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        
        $('.openActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            //now create the div element using the id you got in here...
            var divId = "actionDiv" + idVal;
            
            $('#' + divId).load('files/showputthactionform.php?thId='+idVal);
        });
        
        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });
        
    });//end document.ready function
</script>