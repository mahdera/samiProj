<?php
	$id = $_GET['id'];
	require_once 'form6.php';
	$form6Obj = getForm6($id);
	//define the control names in here...
	$q61TextAreaControlName = "q6_1" . $id;
	$buttonId = "btnupdateform6" . $id;
?>
<form>
    <table border="0" width="100%" style="padding: 5px">
        <tr>
            <td>Q6.1:</td>
            <td>
                <textarea name="<?php echo $q61TextAreaControlName;?>" id="<?php echo $q61TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form6Obj->q6_1);?></textarea>
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
		var buttonId = "btnupdateform6" + id;

		$('#'+buttonId).click(function(){
			var divId = "form6EditDiv" + id;
			var q61TextAreaControlName = "q6_1" + id;
			//now get the values...
			var q61Value = $('#'+q61TextAreaControlName).val();
			var dataString = "id="+id+"&q61Value="+q61Value;
			$.ajax({
                url: 'files/updateform6.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //$('#'+divId).html(response);
										$('#form6Div').load('files/showlistofform6records.php');
                },
                error:function(error){
                    alert(error);
                }
            });
		});
	});//end document.ready function
</script>
