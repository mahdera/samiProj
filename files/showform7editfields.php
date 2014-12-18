<?php
	$id = $_GET['id'];
	require_once 'form7.php';
	$form7Obj = getForm7($id);
	//define the control names in here...
	$q71TextAreaControlName = "q7_1" . $id;
	$buttonId = "btnupdateform7" . $id;
?>
<form>
    <table border="0" width="100%" style="padding: 5px">
        <tr>
            <td>Q7.1:</td>
            <td>
                <textarea name="<?php echo $q71TextAreaControlName;?>" id="<?php echo $q71TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form7Obj->q7_1);?></textarea>
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
		var buttonId = "btnupdateform7" + id;

		$('#'+buttonId).click(function(){
			var divId = "form7EditDiv" + id;
			var q71TextAreaControlName = "q7_1" + id;
			//now get the values...
			var q71Value = $('#'+q71TextAreaControlName).val();
			var dataString = "id="+id+"&q71Value="+q71Value;
			$.ajax({
                url: 'files/updateform7.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //$('#'+divId).html(response);
										$('#form7Div').load('files/showlistofform7records.php');
                },
                error:function(error){
                    alert(error);
                }
            });
		});
	});//end document.ready function
</script>
