<?php
	$id = $_GET['id'];
	require_once 'form2.php';
	$form2Obj = getForm2($id);
	//define the control names in here...
	$q21TextAreaControlName = "q2_1" . $id;
	$q22TextAreaControlName = "q2_2" . $id;
	$q23TextAreaControlName = "q2_3" . $id;
	$q24TextAreaControlName = "q2_4" . $id;
	$buttonId = "btnupdateform2" . $id;
?>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q2.1:</td>
            <td>
                <textarea name="<?php echo $q21TextAreaControlName;?>" id="<?php echo $q21TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo $form2Obj->q2_1;?></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2.2:</td>
            <td>
                <textarea name="<?php echo $q22TextAreaControlName;?>" id="<?php echo $q22TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo $form2Obj->q2_2;?></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2.3:</td>
            <td>
                <textarea name="<?php echo $q23TextAreaControlName;?>" id="<?php echo $q23TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo $form2Obj->q2_3;?></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2.4:</td>
            <td>
                <textarea name="<?php echo $q24TextAreaControlName;?>" id="<?php echo $q24TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo $form2Obj->q2_4;?></textarea>
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
		var buttonId = "btnupdateform2" + id;
		
		$('#'+buttonId).click(function(){			
			var divId = "form2EditDiv" + id;
			var q21TextAreaControlName = "q2_1" + id;
			var q22TextAreaControlName = "q2_2" + id;
			var q23TextAreaControlName = "q2_3" + id;
			var q24TextAreaControlName = "q2_4" + id;
			//now get the values...
			var q21Value = $('#'+q21TextAreaControlName).val();
			var q22Value = $('#'+q22TextAreaControlName).val();
			var q23Value = $('#'+q23TextAreaControlName).val();
			var q24Value = $('#'+q24TextAreaControlName).val();
			var dataString = "id="+id+"&q21Value="+q21Value+"&q22Value="+q22Value+
			"&q23Value="+q23Value+"&q24Value="+q24Value;
			$.ajax({
                url: 'files/updateform2.php',        
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