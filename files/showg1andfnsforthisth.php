<?php
    $id = $_GET['id'];
    require_once 'goalfirst.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg3.php';
    require_once 'fn.php';
    //First I need to get the associated goal first for this th
    $goalFirstList = getAllGoalFirstsUsingThId($id);
    //now get all goalfirstg1s for this goal first
    ?>
    <table border="1" width="100%">
        <tr style="background: #eee">
            <td width="30%">G1</td>
            <td>Fn</td>
            <td>G1 and Fn Detail</td>
        </tr>
    <?php
        while($goalFirstRow = mysql_fetch_object($goalFirstList)){
            //now get goalfirstg1 for each particular goalFirstRows...
            $goalFirstG1List = getAllGoalFirstG1ForThisGoalFirstId($goalFirstRow->id);
            while($goalFirstG1Row = mysql_fetch_object($goalFirstG1List)){
                $fnObj = getFn($goalFirstG1Row->fn_id);
                $innerDivId = "g1FnDetailDiv" . $goalFirstG1Row->id;
                ?>
                <tr>
                    <td><?php echo $goalFirstG1Row->g1;?></td>
                    <td><?php echo $fnObj->fn_name;?></td>
                    <td>
                        [<a href="#.php" class="showG1FnDetailLink" id="<?php echo $goalFirstG1Row->id;?>">Show Detail</a> | <a href="#.php" class="hideG1FnDetailLink" id="<?php echo $goalFirstG1Row->id;?>">Hide Detail</a>]
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="<?php echo $innerDivId;?>"></div>
                    </td>
                </tr>
                <?php
            }//end goalFirstG1List
            //Now I need to do the same thing for goalfirstg2 for each particular goalFirstRows...
       ?>
       <tr style="background: #eee">
            <td width="30%">G2</td>
            <td>Fn</td>
            <td>G2 and Fn Detail</td>
        </tr>         
       <?php
            $goalFirstG2List = getAllGoalFirstG2ForThisGoalFirstId($goalFirstRow->id);
            while($goalFirstG2Row = mysql_fetch_object($goalFirstG2List)){
                $fnObj = getFn($goalFirstG2Row->fn_id);
                $innerDivId = "g2FnDetailDiv" . $goalFirstG2Row->id;
                ?>
                <tr>
                    <td><?php echo $goalFirstG2Row->g2;?></td>
                    <td><?php echo $fnObj->fn_name;?></td>
                    <td>
                        [<a href="#.php" class="showG2FnDetailLink" id="<?php echo $goalFirstG2Row->id;?>">Show Detail</a> | <a href="#.php" class="hideG2FnDetailLink" id="<?php echo $goalFirstG2Row->id;?>">Hide Detail</a>]
                    </td>                    
                </tr>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="<?php echo $innerDivId;?>"></div>
                    </td>
                </tr>
                <?php
            }//end goalFirstG2List
        
        //Now I need to do the same thing for goalfirstg3 for each particular goalfirst rows...        
        ?>
         <tr style="background: #eee">
            <td width="30%">G3</td>
            <td>Fn</td>
            <td>G3 and Fn Detail</td>
        </tr>         
        <?php
            $goalFirstG3List = getAllGoalFirstG3ForThisGoalFirstId($goalFirstRow->id);
            while($goalFirstG3Row = mysql_fetch_object($goalFirstG3List)){
                $fnObj = getFn($goalFirstG3Row->fn_id);
                $innerDivId = "g3FnDetailDiv" . $goalFirstG3Row->id;
                ?>
                <tr>
                    <td><?php echo $goalFirstG3Row->g3;?></td>
                    <td><?php echo $fnObj->fn_name;?></td>
                    <td>
                        [<a href="#.php" class="showG3FnDetailLink" id="<?php echo $goalFirstG3Row->id;?>">Show Detail</a> | <a href="#.php" class="hideG3FnDetailLink" id="<?php echo $goalFirstG3Row->id;?>">Hide Detail</a>]
                    </td>                    
                </tr>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="<?php echo $innerDivId;?>"></div>
                    </td>
                </tr>
                <?php
            }//end goalFirstG2List
        }//end goalFirstList while loop
        ?>    
</table>
<script type="text/javascript">
    $(document).ready(function(){
        //This part will deal with the GoalFirstG1 part
        $('.showG1FnDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g1FnDetailDiv" + id;
            $('#'+divId).load('files/showg1fndetail.php?id='+id);
        });
        
        $('.hideG1FnDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g1FnDetailDiv" + id;
            $('#'+divId).html('');
        });
        
        //This part will deal with the GoalFirstG2 part
        $('.showG2FnDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g2FnDetailDiv" + id;
            $('#'+divId).load('files/showg2fndetail.php?id='+id);
        });
        
        $('.hideG2FnDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g2FnDetailDiv" + id;
            $('#'+divId).html('');
        });
        
        //This part will deal with the GoalFirstG3 part
        $('.showG3FnDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g3FnDetailDiv" + id;
            $('#'+divId).load('files/showg3fndetail.php?id='+id);
        });
        
        $('.hideG3FnDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g3FnDetailDiv" + id;
            $('#'+divId).html('');
        });
        
    });//end document.ready function
</script>
