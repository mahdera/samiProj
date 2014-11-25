<?php
    session_start();
    $id = $_GET['id'];
    require_once 'risk.php';
    require_once 'th.php';
    $riskObj = getRisk($id);
    //now define the control names
    $thControlName = "slctth" . $id;
    $mgControlName = "slctmg" . $id;
    $drControlName = "slctdr" . $id;
    $prControlName = "slctpr" . $id;
    $waControlName = "slctwa" . $id;
    $rsControlName = "slctrs" . $id;
    $buttonId = "btnupdate" . $id;
?>
<h2>Edit Risk</h2>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Th:</td>
            <td>
                <select name="<?php echo $thControlName;?>" id="<?php echo $thControlName;?>" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        $thList = getAllThsModifiedBy($_SESSION['LOGGED_USER_ID']);
                        while($thRow = mysql_fetch_object($thList)){
                            if($thRow->id == $riskObj->th_id){
                            ?>
                                <option value="<?php echo $thRow->id;?>" selected="selected"><?php echo $thRow->th_name;?></option>
                            <?php
                            }else{
                            ?>
                                <option value="<?php echo $thRow->id;?>"><?php echo $thRow->th_name;?></option>
                            <?php
                            }
                        }//end while loop
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>MG</td>
            <td>
                <select name="<?php echo $mgControlName;?>" id="<?php echo $mgControlName;?>" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        if($riskObj->mg === 'mg1'){
                            ?>
                                <option value="mg1" selected="selected">mg1</option>
                                <option value="mg2">mg2</option>
                                <option value="mg3">mg3</option>
                                <option value="mg4">mg4</option>
                            <?php
                        }else if($riskObj->mg === 'mg2'){
                            ?>
                                <option value="mg1">mg1</option>
                                <option value="mg2" selected="selected">mg2</option>
                                <option value="mg3">mg3</option>
                                <option value="mg4">mg4</option>
                            <?php
                        }else if($riskObj->mg === 'mg3'){
                            ?>
                                <option value="mg1">mg1</option>
                                <option value="mg2">mg2</option>
                                <option value="mg3" selected="selected">mg3</option>
                                <option value="mg4">mg4</option>
                            <?php
                        }else if($riskObj->mg === 'mg4'){
                            ?>
                                <option value="mg1">mg1</option>
                                <option value="mg2">mg2</option>
                                <option value="mg3">mg3</option>
                                <option value="mg4" selected="selected">mg4</option>
                            <?php
                        }else{
                            ?>
                                <option value="mg1">mg1</option>
                                <option value="mg2">mg2</option>
                                <option value="mg3">mg3</option>
                                <option value="mg4">mg4</option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>DR</td>
            <td>
                <select name="<?php echo $drControlName;?>" id="<?php echo $drControlName;?>" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        if($riskObj->dr === 'dr1'){
                            ?>
                                <option value="dr1" selected="selected">dr1</option>
                                <option value="dr2">dr2</option>
                                <option value="dr3">dr3</option>
                                <option value="dr4">dr4</option>
                            <?php
                        }else if($riskObj->dr === 'dr2'){
                            ?>
                                <option value="dr1">dr1</option>
                                <option value="dr2" selected="selected">dr2</option>
                                <option value="dr3">dr3</option>
                                <option value="dr4">dr4</option>
                            <?php
                        }else if($riskObj->dr === 'dr3'){
                            ?>
                                <option value="dr1">dr1</option>
                                <option value="dr2">dr2</option>
                                <option value="dr3" selected="selected">dr3</option>
                                <option value="dr4">dr4</option>
                            <?php
                        }else if($riskObj->dr === 'dr4'){
                            ?>
                                <option value="dr1">dr1</option>
                                <option value="dr2">dr2</option>
                                <option value="dr3">dr3</option>
                                <option value="dr4" selected="selected">dr4</option>
                            <?php
                        }else{
                            ?>
                                <option value="dr1">dr1</option>
                                <option value="dr2">dr2</option>
                                <option value="dr3">dr3</option>
                                <option value="dr4">dr4</option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>PR</td>
            <td>
                <select name="<?php echo $prControlName;?>" id="<?php echo $prControlName;?>" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        if($riskObj->pr === 'pr1'){
                            ?>
                                <option value="pr1" selected="selected">pr1</option>
                                <option value="pr2">pr2</option>
                                <option value="pr3">pr3</option>
                                <option value="pr4">pr4</option>
                            <?php
                        }else if($riskObj->pr === 'pr2'){
                            ?>
                                <option value="pr1">pr1</option>
                                <option value="pr2" selected="selected">pr2</option>
                                <option value="pr3">pr3</option>
                                <option value="pr4">pr4</option>
                            <?php
                        }else if($riskObj->pr === 'pr3'){
                            ?>
                                <option value="pr1">pr1</option>
                                <option value="pr2">pr2</option>
                                <option value="pr3" selected="selected">pr3</option>
                                <option value="pr4">pr4</option>
                            <?php
                        }else if($riskObj->pr === 'pr4'){
                            ?>
                                <option value="pr1">pr1</option>
                                <option value="pr2">pr2</option>
                                <option value="pr3">pr3</option>
                                <option value="pr4" selected="selected">pr4</option>
                            <?php
                        }else{
                            ?>
                                <option value="pr1">pr1</option>
                                <option value="pr2">pr2</option>
                                <option value="pr3">pr3</option>
                                <option value="pr4">pr4</option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>WA</td>
            <td>
                <select name="<?php echo $waControlName;?>" id="<?php echo $waControlName;?>" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        if($riskObj->wa === 'wa1'){
                            ?>
                                <option value="wa1" selected="selected">wa1</option>
                                <option value="wa2">wa2</option>
                                <option value="wa3">wa3</option>
                                <option value="wa4">wa4</option>
                            <?php
                        }else if($riskObj->wa === 'wa2'){
                            ?>
                                <option value="wa1">wa1</option>
                                <option value="wa2" selected="selected">wa2</option>
                                <option value="wa3">wa3</option>
                                <option value="wa4">wa4</option>
                            <?php
                        }else if($riskObj->wa === 'wa3'){
                            ?>
                                <option value="wa1">wa1</option>
                                <option value="wa2">wa2</option>
                                <option value="wa3" selected="selected">wa3</option>
                                <option value="wa4">wa4</option>
                            <?php
                        }else if($riskObj->wa === 'wa4'){
                            ?>
                                <option value="wa1">wa1</option>
                                <option value="wa2">wa2</option>
                                <option value="wa3">wa3</option>
                                <option value="wa4" selected="selected">wa4</option>
                            <?php
                        }else{
                            ?>
                                <option value="wa1">wa1</option>
                                <option value="wa2">wa2</option>
                                <option value="wa3">wa3</option>
                                <option value="wa4">wa4</option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>RS</td>
            <td>
                <select name="<?php echo $rsControlName;?>" id="<?php echo $rsControlName;?>" style="width: 100%">
                    <option value="" selected="selected">--Select--</option>
                    <?php
                        if($riskObj->rs === 'rs1'){
                            ?>
                                <option value="rs1" selected="selected">rs1</option>
                                <option value="rs2">rs2</option>
                                <option value="rs3">rs3</option>
                                <option value="rs4">rs4</option>
                            <?php
                        }else if($riskObj->rs === 'rs2'){
                            ?>
                                <option value="rs1">rs1</option>
                                <option value="rs2" selected="selected">rs2</option>
                                <option value="rs3">rs3</option>
                                <option value="rs4">rs4</option>
                            <?php
                        }else if($riskObj->rs === 'rs3'){
                            ?>
                                <option value="rs1">rs1</option>
                                <option value="rs2">rs2</option>
                                <option value="rs3" selected="selected">rs3</option>
                                <option value="rs4">rs4</option>
                            <?php
                        }else if($riskObj->rs === 'rs4'){
                            ?>
                                <option value="rs1">rs1</option>
                                <option value="rs2">rs2</option>
                                <option value="rs3">rs3</option>
                                <option value="rs4" selected="selected">rs4</option>
                            <?php
                        }else{
                            ?>
                                <option value="rs1">rs1</option>
                                <option value="rs2">rs2</option>
                                <option value="rs3">rs3</option>
                                <option value="rs4">rs4</option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
            </td>
        </tr>
    </table>
</form>
<hr/>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        //now define the control names in here...
        var thControlName = "slctth" + id;
        var mgControlName = "slctmg" + id;
        var drControlName = "slctdr" + id;
        var prControlName = "slctpr" + id;
        var waControlName = "slctwa" + id;
        var rsControlName = "slctrs" + id;
        var buttonId = "btnupdate" + id;

        $('#'+buttonId).click(function(){
            //now get the values...
            var thId = $('#'+thControlName).val();
            var mg = $('#'+mgControlName).val();
            var dr = $('#'+drControlName).val();
            var pr = $('#'+prControlName).val();
            var wa = $('#'+waControlName).val();
            var rs = $('#'+rsControlName).val();

            var dataString = "id="+id+"&thId="+thId+"&mg="+mg+"&dr="+dr+
                    "&pr="+pr+"&wa="+wa+"&rs="+rs;
            var divId = "riskEditDiv" + id;

            $.ajax({
                url: 'files/updaterisk.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    $('#'+divId).html(response);
                },
                error:function(error){
                    alert(error);
                }
            });

        });

    });//end document.ready function
</script>
