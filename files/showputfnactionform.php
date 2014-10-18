<?php
    $fn_id = $_GET['fn_id'];
    //now i need to get all the goals and objs associated with this fn_id
    //tables that i need to use to perform this functionality are...
    //tbl_goal_first_g1_obj_fn
    //tbl_goal_first_g2_obj_fn
    //tbl_goal_first_g3_obj_fn
    require_once 'goalfirstg1objfn.php';
    require_once 'goalfirstg2objfn.php';
    require_once 'goalfirstg3objfn.php';
    require_once 'fn.php';
    require_once 'goalfirstg1.php';
    require_once 'goalfirstg2.php';
    require_once 'goalfirstg3.php';
    
    //now get all the records from each table associated with the $fn_id;
    $goal_first_g1_obj_fn_list = getAllGoalFirstG1ObjFnsForFn($fn_id);    
    $goal_first_g2_obj_fn_list = getAllGoalFirstG2ObjFnsForFn($fn_id);
    $goal_first_g3_obj_fn_list = getAllGoalFirstG3ObjFnsForFn($fn_id);
    //now I got all the result set read from the database...lets do the iteration thing now...
    $fn = getFn($fn_id);
?>
<table border="0" width="100%">
    <tr>
        <td width="30%">Fn</td>
        <td>
            <?php echo $fn->fn_name;?>
        </td>
    </tr>
    <!--now do the g1 and obj1 listing here-->
    <?php
    while($goal_first_g1_obj_fn_row = mysql_fetch_object($goal_first_g1_obj_fn_list)){
        $goal_first_g1_id = $goal_first_g1_obj_fn_row->goal_first_g1_id;
        //now get the goal_first_id from tbl_goal_first_g1 table
        $goal_first_g1 = getGoalFirstG1($goal_first_g1_id);        
        ?>
        <tr>
            <td>G1</td>
            <td>
                <?php echo $goal_first_g1->g1;?>
            </td>
        </tr>
        <tr>
            <td>Obj</td>
            <td><?php echo $goal_first_g1_obj_fn_row->obj;?></td>
        </tr>
        <?php
    }//end while loop
    ?>
    <!--now do the g2 and obj listing here-->
    <?php
    while($goal_first_g2_obj_fn_row = mysql_fetch_object($goal_first_g2_obj_fn_list)){
        $goal_first_g2_id = $goal_first_g2_obj_fn_row->goal_first_g2_id;
        //now get the goal_first_id from tbl_goal_first_g2 table
        $goal_first_g2 = getGoalFirstG2($goal_first_g2_id);        
        ?>
        <tr>
            <td>G2</td>
            <td>
                <?php echo $goal_first_g2->g2;?>
            </td>
        </tr>
        <tr>
            <td>Obj</td>
            <td><?php echo $goal_first_g2_obj_fn_row->obj;?></td>
        </tr>
        <?php
    }//end while loop
    ?>
    <!--now do the g3 an obj listing here-->
    <?php
    while($goal_first_g3_obj_fn_row = mysql_fetch_object($goal_first_g3_obj_fn_list)){
        $goal_first_g3_id = $goal_first_g3_obj_fn_row->goal_first_g3_id;
        //now get the goal_first_id from tbl_goal_first_g2 table
        $goal_first_g3 = getGoalFirstG3($goal_first_g3_id);        
        ?>
        <tr>
            <td>G3</td>
            <td>
                <?php echo $goal_first_g3->g3;?>
            </td>
        </tr>
        <tr>
            <td>Obj</td>
            <td><?php echo $goal_first_g3_obj_fn_row->obj;?></td>
        </tr>
        <?php
    }//end while loop
    ?>
    <tr>
        <td>Add Action</td>
        <td>
            <?php
                //the name should be dynamic...
                $textAreaId = "fnAction_" . $fn_id;
                $buttonId = "fnAddAction_" . $fn_id;
            ?>
            <textarea name="<?php echo $textAreaId;?>" id="<?php echo $textAreaId;?>" rows="3" style="width: 100%"></textarea> 
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right">
            <input type="button" value="Add Action" id="<?php echo $buttonId;?>"/>                    
        </td>
    </tr>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        var fnId = "<?php echo $fn_id;?>";
        var textAreaId = "fnAction_" + fnId;
        var buttonId = "fnAddAction_" + fnId;
        var divId = "actionDiv" + fnId;
        
        $('#'+buttonId).click(function(){
            //now get the value from the textarea...
            var textAreaValue = $('#'+textAreaId).val();
            var dataString = "fnId="+fnId+"&textAreaValue="+textAreaValue;
            //alert(dataString);
            //now save this part and update the div about the status of the save transaction
            if(textAreaValue !== ''){
                $.ajax({
                    url: 'files/savefnaction.php',        
                    data: dataString,
                    type:'POST',
                    success:function(response){                     
                        $('#'+divId).html(response);
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }else{
                alert('Enter the Fn Action text!');
            }
        });
    });//end document.ready function
</script>

