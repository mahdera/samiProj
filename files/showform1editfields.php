<?php
	$id = $_GET['id'];
	require_once 'form1.php';
	$form1Obj = getForm1($id);
	//define the control names in here...
	$titleControlName = "txttitle" . $id;
	$dateControlName = "datepicker" . $id;
	$planControlName = "textareaplan" . $id;
	$q1ControlName = "textareaq1" . $id;
    $q2ControlName = "textareaq2" . $id;
	$buttonId = "btnupdateform1" . $id;
?>
<form style="background:white">
    <table border="0" width="100%">
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="<?php echo $titleControlName;?>" id="<?php echo $titleControlName;?>" value="<?php echo $form1Obj->title;?>"/>
            </td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>
                <input type="text" id="<?php echo $dateControlName;?>" name="<?php echo $dateControlName;?>" value="<?php echo $form1Obj->form_date;?>"/>
            </td>
        </tr>
        <tr>
            <td>Plan:</td>
            <td>
                <textarea name="<?php echo $planControlName;?>" id="<?php echo $planControlName;?>" style="width: 100%" rows="3"><?php echo $form1Obj->plan;?></textarea>
            </td>
        </tr>
        <tr>
            <td>Q1:</td>
            <td>
                <textarea name="<?php echo $q1ControlName;?>" id="<?php echo $q1ControlName;?>" style="width: 100%" rows="3"><?php echo $form1Obj->q1;?></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2:</td>
            <td>
                <textarea name="<?php echo $q2ControlName;?>" id="<?php echo $q2ControlName;?>" style="width: 100%" rows="3"><?php echo $form1Obj->q2;?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input type="button" value="Update" id="<?php echo $buttonId;?>"/>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        var id = "<?php echo $id;?>";
        var buttonId = "btnupdateform1" + id;

        $('#'+buttonId).click(function(){
            var divId = "form1EditDiv" + id;
            var titleControlName = "txttitle" + id;
            var dateControlName = "datepicker" + id;
            var planControlName = "textareaplan" + id;
            var q1ControlName = "textareaq1" + id;
            var q2ControlName = "textareaq2" + id;
            //now get the values...
            var titleValue = $('#'+titleControlName).val();
            var dateValue = $('#'+dateControlName).val();
            var planValue = $('#'+planControlName).val();
            var q1Value = $('#'+q1ControlName).val();
            var q2Value = $('#'+q2ControlName).val();
            var dataString = "id="+id+"&titleValue="+titleValue+"&dateValue="+dateValue+
            "&planValue="+planValue+"&q1Value="+q1Value+"&q2Value="+q2Value;
            $.ajax({
                url: 'files/updateform1.php',
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
