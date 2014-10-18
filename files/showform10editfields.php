<?php
	$id = $_GET['id'];
	require_once 'form10.php';
	$form10Obj = getForm10($id);
	//define the control names in here...
	$q101TextAreaControlName = "q10_1" . $id;	
	$buttonId = "btnupdateform10" . $id;
?>
<form>
    <table border="0" width="100%">
        <tr>
            <td>Q10.1:</td>
            <td>
                <textarea name="<?php echo $q101TextAreaControlName;?>" id="<?php echo $q101TextAreaControlName;?>" style="width: 100%" rows="3"><?php echo $form10Obj->q10_1;?></textarea>
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
		var buttonId = "btnupdateform10" + id;
		
		$('#'+buttonId).click(function(){			
			var divId = "form10EditDiv" + id;
			var q101TextAreaControlName = "q10_1" + id;			
			//now get the values...
			var q101Value = $('#'+q101TextAreaControlName).val();			
			var dataString = "id="+id+"&q101Value="+q101Value;
			$.ajax({
                url: 'files/updateform10.php',        
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