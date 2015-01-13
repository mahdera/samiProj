<?php
    $id = $_GET['id'];
    require_once 'goalsecond.php';
    require_once 'goalsecondg1.php';
    require_once 'goalsecondg2.php';
    require_once 'goalsecondg3.php';
    require_once 'fn.php';
    //First I need to get the associated goal first for this th
    $goalSecondList = getAllGoalSecondsUsingFnId($id);
    //now get all goalfirstg1s for this goal first
    ?>
    <table border="1" width="100%">
        <tr style="background: #eee">
            <td width="30%">G1</td>
            <td>Obj Detail</td>
        </tr>
    <?php
        while($goalSecondRow = mysql_fetch_object($goalSecondList)){
            //now get goalfirstg1 for each particular goalFirstRows...
            $goalSecondG1List = getAllGoalSecondG1ForThisGoalSecondId($goalSecondRow->id);
            while($goalSecondG1Row = mysql_fetch_object($goalSecondG1List)){
                $goalSecondG1 = getGoalSecondG1($goalSecondG1Row->goal_second_id);
                $innerDivId = "g1ObjDetailDiv" . $goalSecondG1Row->id;
                ?>
                <tr>
                    <td><?php echo $goalSecondG1->g1;?></td>
                    <td>
                        [<a href="#.php" class="showG1ObjDetailLink" id="<?php echo $goalSecondG1Row->id;?>">Show Detail</a> | <a href="#.php" class="hideG1ObjDetailLink" id="<?php echo $goalSecondG1Row->id;?>">Hide Detail</a>]
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="<?php echo $innerDivId;?>"></div>
                    </td>
                </tr>
                <?php
            }//end goalFirstG1List
            //Now I need to do the same thing for goalfirstg2 for each particular goalFirstRows...
       ?>
        <tr style="background: #eee">
            <td width="30%">G2</td>
            <td>Obj Detail</td>
        </tr>
       <?php
            $goalSecondG2List = getAllGoalSecondG2ForThisGoalSecondId($goalSecondRow->id);
            while($goalSecondG2Row = mysql_fetch_object($goalSecondG2List)){
                $goalSecondG2 = getGoalSecondG2($goalSecondG2Row->goal_second_id);
                $innerDivId = "g2ObjDetailDiv" . $goalSecondG2Row->id;
                ?>
                <tr>
                    <td><?php echo $goalSecondG2->g2;?></td>
                    <td>
                        [<a href="#.php" class="showG2ObjDetailLink" id="<?php echo $goalSecondG2Row->id;?>">Show Detail</a> | <a href="#.php" class="hideG2ObjDetailLink" id="<?php echo $goalSecondG2Row->id;?>">Hide Detail</a>]
                    </td>
                </tr>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="<?php echo $innerDivId;?>"></div>
                    </td>
                </tr>
                <?php
            }//end goalFirstG2List

        //Now I need to do the same thing for goalfirstg3 for each particular goalfirst rows...
        ?>
         <tr style="background: #eee">
            <td width="30%">G3</td>
            <td>Obj Detail</td>
        </tr>
        <?php
            $goalSecondG3List = getAllGoalSecondG3ForThisGoalSecondId($goalSecondRow->id);
            while($goalSecondG3Row = mysql_fetch_object($goalSecondG3List)){
                $goalSecondG3 = getGoalSecondG3($goalSecondG3Row->goal_second_id);
                $innerDivId = "g3ObjDetailDiv" . $goalSecondG3Row->id;
                ?>
                <tr>
                    <td><?php echo $goalSecondG3->g3;?></td>
                    <td>
                        [<a href="#.php" class="showG3ObjDetailLink" id="<?php echo $goalSecondG3Row->id;?>">Show Detail</a> | <a href="#.php" class="hideG3ObjDetailLink" id="<?php echo $goalSecondG3Row->id;?>">Hide Detail</a>]
                    </td>
                </tr>
                </tr>
                <tr>
                    <td colspan="2">
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
        $('.showG1ObjDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g1ObjDetailDiv" + id;
            $('#'+divId).load('files/showg1objdetail.php?id='+id,{noncache: new Date().getTime()});
        });

        $('.hideG1ObjDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g1ObjDetailDiv" + id;
            $('#'+divId).html('');
        });

        //This part will deal with the GoalFirstG2 part
        $('.showG2ObjDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g2ObjDetailDiv" + id;
            $('#'+divId).load('files/showg2objdetail.php?id='+id,{noncache: new Date().getTime()});
        });

        $('.hideG2ObjDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g2ObjDetailDiv" + id;
            $('#'+divId).html('');
        });

        //This part will deal with the GoalFirstG3 part
        $('.showG3ObjDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g3ObjDetailDiv" + id;
            $('#'+divId).load('files/showg3objdetail.php?id='+id,{noncache: new Date().getTime()});
        });

        $('.hideG3ObjDetailLink').click(function(){
            var id = $(this).attr('id');
            var divId = "g3ObjDetailDiv" + id;
            $('#'+divId).html('');
        });

    });//end document.ready function
</script>
