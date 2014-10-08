<?php
    require_once 'team.php';
    require_once 'responsibility.php';
    $id = $_GET['id'];
    $responsibilityObj = getResponsibility($id);
?>
<h2>Edit Responsibility</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Team:</td>
            <td>
                <select name="slctteam" id="slctteam" style="width:100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        //now get list of teams from the database...
                        $teamList = getAllTeams();
                        if(!empty($teamList)){
                            while($teamRow = mysql_fetch_object($teamList)){
                                if()
                                ?>
                                    <option value="<?php echo $teamRow->id;?>"><?php echo $teamRow->team_name;?></option>
                                <?php
                            }//end while loop
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Role:</td>
            <td>
                <textarea name="textarearole" id="textarearole" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>Responsibility:</td>
            <td>
                <textarea name="textarearesponsibility" id="textarearesponsibility" style="width: 100%" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Save" id="btnsave"/>
                <input type="reset" value="Clear"/>
            </td>
        </tr>        
    </table>
</form>
<hr/>