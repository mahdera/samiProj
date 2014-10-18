<h1>Th Action</h1>
<?php
    require_once 'files/th.php';
    require_once 'files/thaction.php';
    $thList = getAllThsModifiedBy($_SESSION['LOGGED_USER_ID']);
    
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
                    $countVal = 0;
                    $divId = "actionDiv" . $thRow->id;
                    $countVal = doesThisThAlreadyActionFilledForIt($thRow->id);
                    if(!$countVal){
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
                    }
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
            alert(divId);
            $('#' + divId).load('files/showputthactionform.php?thId='+idVal);
        });
        
        $('.closeActionFormClass').click(function(){
            var idVal = $(this).attr('id');
            var divId = "actionDiv" + idVal;
            $('#' + divId).html('');
        });
        
    });//end document.ready function
</script>