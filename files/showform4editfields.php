<?php
	$id = $_GET['id'];
	require_once 'form4.php';
	$form4Obj = getForm4($id);
	//define the control names in here...
	$q41TextAreaControlName = "q4_1" . $id;
	$buttonId = "btnupdateform4" . $id;
?>
<form>
    <table border="0" width="100%" style="padding: 5px">
        <tr>
            <td>Q4.1:</td>
            <td>
                <textarea name="<?php echo $q41TextAreaControlName;?>" id="<?php echo $q41TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form4Obj->q4_1);?></textarea>
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
		var buttonId = "btnupdateform4" + id;

		$('#'+buttonId).click(function(){
			var divId = "form4EditDiv" + id;
			var q41TextAreaControlName = "q4_1" + id;
			//now get the values...
			var q41Value = $('#'+q41TextAreaControlName).val();
			var dataString = "id="+id+"&q41Value="+q41Value;
			$.ajax({
                url: 'files/updateform4.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //$('#'+divId).html(response);
										$('#form4Div').load('files/showlistofform4records.php');
                },
                error:function(error){
                    alert(error);
                }
            });
		});
	});//end document.ready function
</script>
