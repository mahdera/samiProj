<?php
    require_once 'team.php';
    require_once 'responsibility.php';
    $id = $_GET['id'];
    $responsibilityObj = getResponsibility($id);
    //now define the control names to avoid naming conflict...
    $teamSelectControl = "slctteam" . $id;
    $roleControl = "textarearole" . $id;
    $responsibilityControl = "textarearesponsibility" . $id;
?>
<h2>Edit Responsibility</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Team:</td>
            <td>
                <select name="<?php echo $teamSelectControl;?>" id="<?php echo $teamSelectControl;?>" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        //now get list of teams from the database...
                        $teamList = null;
                        $teamList = getAllTeams();
                        if(isset($teamList)){
                            while($teamRow = mysql_fetch_object($teamList)){
                                if($responsibilityObj->team_id == $teamRow->id){
                                ?>
                                    <option value="<?php echo $teamRow->id;?>" selected="selected"><?php echo $teamRow->team_name;?></option>
                                <?php
                                }else{
                                ?>
                                    <option value="<?php echo $teamRow->id;?>"><?php echo $teamRow->team_name;?></option>
                                <?php
                                }
                            }//end while loop
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Role:</td>
            <td>
                <textarea name="<?php echo $roleControl;?>" id="<?php echo $roleControl;?>" style="width: 100%" rows="3"><?php echo $responsibilityObj->role;?></textarea>
            </td>
        </tr>
        <tr>
            <td>Responsibility:</td>
            <td>
                <textarea name="<?php echo $responsibilityControl;?>" id="<?php echo $responsibilityControl;?>" style="width: 100%" rows="3"><?php echo $responsibilityObj->responsibility;?></textarea>
            </td>
        </tr>
        <tr>
            <?php
                //now define the button id
                $buttonId = "btnupdate" . $id;
            ?>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
                <input type="reset" value="Clear"/>
            </td>
        </tr>
    </table>
</form>
<hr/>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        //define the button id
        var buttonId = "btnupdate" + id;

        $('#'+buttonId).click(function(){
            //now define the control names...
            var teamSelectControl = "slctteam" + id;
            var roleControl = "textarearole" + id;
            var responsibilityControl = "textarearesponsibility" + id;
            //now get the values
            var teamId = $('#'+teamSelectControl).val();
            var role = $('#'+roleControl).val();
            var responsibility = $('#'+responsibilityControl).val();

            if(teamId !== "" && role !== "" && responsibility !== ""){
                var dataString = "id="+id+"&teamId="+teamId+"&role="+role+"&responsibility="+
                        responsibility;
                var divId = "responsibilityEditDiv" + id;
                $.ajax({
                    url: 'files/updateresponsibility.php',
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
                alert("Please don't leave input boxes empty! Try again!");
            }

        });

    });//end document.ready function
</script>
