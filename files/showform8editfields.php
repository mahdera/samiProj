<?php
	$id = $_GET['id'];
	require_once 'form8.php';
	$form8Obj = getForm8($id);
	//define the control names in here...
	$q81TextAreaControlName = "q8_1" . $id;
	$buttonId = "btnupdateform8" . $id;
?>
<form>
    <table border="0" width="100%" style="padding: 5px">
        <tr>
            <td>Q8.1:</td>
            <td>
                <textarea name="<?php echo $q81TextAreaControlName;?>" id="<?php echo $q81TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form8Obj->q8_1);?></textarea>
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
		var buttonId = "btnupdateform8" + id;

		$('#'+buttonId).click(function(){
			var divId = "form8EditDiv" + id;
			var q81TextAreaControlName = "q8_1" + id;
			//now get the values...
			var q81Value = $('#'+q81TextAreaControlName).val();
			var dataString = "id="+id+"&q81Value="+q81Value;
			$.ajax({
                url: 'files/updateform8.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //$('#'+divId).html(response);
										$('#form8Div').load('files/showlistofform8records.php');
                },
                error:function(error){
                    alert(error);
                }
            });
		});
	});//end document.ready function
</script>
