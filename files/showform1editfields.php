<?php
	$id = $_GET['id'];
	require_once 'form1.php';
	require_once 'form1q3.php';
	require_once 'form1q4.php';
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
    <table border="0" width="100%" style="padding:5px">
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="<?php echo $titleControlName;?>" id="<?php echo $titleControlName;?>" value="<?php echo stripslashes($form1Obj->title);?>"/>
            </td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>
                <input type="text" id="<?php echo $dateControlName;?>" name="<?php echo $dateControlName;?>" value="<?php echo stripslashes($form1Obj->form_date);?>"/>
            </td>
        </tr>
        <tr>
            <td>Plan:</td>
            <td>
                <textarea name="<?php echo $planControlName;?>" id="<?php echo $planControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form1Obj->plan);?></textarea>
            </td>
        </tr>
        <tr>
            <td>Q1:</td>
            <td>
                <textarea name="<?php echo $q1ControlName;?>" id="<?php echo $q1ControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form1Obj->q1);?></textarea>
            </td>
        </tr>
        <tr>
            <td>Q2:</td>
            <td>
                <textarea name="<?php echo $q2ControlName;?>" id="<?php echo $q2ControlName;?>" style="width: 100%" rows="3"><?php echo stripslashes($form1Obj->q2);?></textarea>
            </td>
        </tr>
				<tr>
						<td>Q3:</td>
						<td>
								<table border="0" width="100%">
										<tr style="background: #eee">
												<td>Col1</td>
												<td>Col2</td>
												<td>Col3</td>
												<td>Col4</td>
										</tr>
										<?php
												$form1Q3List = getAllForm1Q3ForThisForm1($form1Obj->id);
												$colCount = 1;
												$q3RowClass = "thRowQ3Edit" . $form1Obj->id;
												while($form1Q3Row = mysql_fetch_object($form1Q3List)){
														$textBoxId = "txteditrowq3" . $form1Q3Row->row . $form1Q3Row->col;
														if($colCount == 1){
															echo "<tr class='$q3RowClass'>";
														}if($colCount < 4){
															?>
																<td><input type="text" name="<?php echo $textBoxId;?>" id="<?php echo $textBoxId;?>" value="<?php echo stripslashes($form1Q3Row->column_value);?>"/></td>
															<?php
														}if($colCount == 4){
															?>
																<td><input type="text" name="<?php echo $textBoxId;?>" id="<?php echo $textBoxId;?>" value="<?php echo stripslashes($form1Q3Row->column_value);?>"/></td>
															<?php
															$colCount = 0;
															echo "</tr>";
														}
														$colCount++;
												}//end while loop
										?>
								</table>
						</td>
				</tr>
				<tr>
						<td>Q4:</td>
						<td>
								<table border="0" width="100%">
										<tr style="background: #eee">
												<td>Col1</td>
												<td>Col2</td>
												<td>Col3</td>
												<td>Col4</td>
										</tr>
										<?php
												$form1Q4List = getAllForm1Q4ForThisForm1($form1Obj->id);
												$colCount = 1;
												$q4RowClass = "thRowQ4Edit" . $form1Obj->id;
												while($form1Q4Row = mysql_fetch_object($form1Q4List)){
														$textBoxId = "txteditrowq4" . $form1Q4Row->row . $form1Q4Row->col;
														if($colCount == 1){
															echo "<tr class='$q4RowClass'>";
														}if($colCount < 4){
															?>
																<td><input type="text" name="<?php echo $textBoxId;?>" id="<?php echo $textBoxId;?>" value="<?php echo $form1Q4Row->column_value;?>"/></td>
															<?php
														}if($colCount == 4){
															?>
																<td><input type="text" name="<?php echo $textBoxId;?>" id="<?php echo $textBoxId;?>" value="<?php echo $form1Q4Row->column_value;?>"/></td>
															<?php
															$colCount = 0;
															echo "</tr>";
														}
														$colCount++;
												}//end while loop
										?>
								</table>
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
				var q3RowClass = "thRowQ3Edit" + id;
				var q4RowClass = "thRowQ4Edit" + id;

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

						var q3NumRows = $('.'+q3RowClass).length;
						var q4NumRows = $('.'+q4RowClass).length;

            var dataString = "id="+id+"&titleValue="+titleValue+"&dateValue="+dateValue+
            "&planValue="+planValue+"&q1Value="+q1Value+"&q2Value="+q2Value+
						"&q3NumRows="+q3NumRows+"&q4NumRows="+q4NumRows;

						for(var i=1; i <= q3NumRows; i++){
								var textBoxCol1Id = "txteditrowq3"+i+1;
								var textBoxCol2Id = "txteditrowq3"+i+2;
								var textBoxCol3Id = "txteditrowq3"+i+3;
								var textBoxCol4Id = "txteditrowq3"+i+4;
								//now get the value...
								var textBoxCol1Val = $('#'+textBoxCol1Id).val();
								var textBoxCol2Val = $('#'+textBoxCol2Id).val();
								var textBoxCol3Val = $('#'+textBoxCol3Id).val();
								var textBoxCol4Val = $('#'+textBoxCol4Id).val();

								dataString += "&"+textBoxCol1Id+"="+encodeURIComponent(textBoxCol1Val)+
												"&"+textBoxCol2Id+"="+encodeURIComponent(textBoxCol2Val)+
												"&"+textBoxCol3Id+"="+encodeURIComponent(textBoxCol3Val)+
												"&"+textBoxCol4Id+"="+encodeURIComponent(textBoxCol4Val);
						}//end for loop


						for(var i=1; i <= q4NumRows; i++){
								var textBoxCol1Id = "txteditrowq4"+i+1;
								var textBoxCol2Id = "txteditrowq4"+i+2;
								var textBoxCol3Id = "txteditrowq4"+i+3;
								var textBoxCol4Id = "txteditrowq4"+i+4;
								//now get the value...
								var textBoxCol1Val = $('#'+textBoxCol1Id).val();
								var textBoxCol2Val = $('#'+textBoxCol2Id).val();
								var textBoxCol3Val = $('#'+textBoxCol3Id).val();
								var textBoxCol4Val = $('#'+textBoxCol4Id).val();

								dataString += "&"+textBoxCol1Id+"="+encodeURIComponent(textBoxCol1Val)+
												"&"+textBoxCol2Id+"="+encodeURIComponent(textBoxCol2Val)+
												"&"+textBoxCol3Id+"="+encodeURIComponent(textBoxCol3Val)+
												"&"+textBoxCol4Id+"="+encodeURIComponent(textBoxCol4Val);
						}//end for loop


            $.ajax({
                url: 'files/updateform1.php',
                data: dataString,
                type:'POST',
                success:function(response){
                    //$('#'+divId).html(response);
										$('#form1Div').load('files/showlistofform1records.php');
                },
                error:function(error){
                    alert(error);
                }
            });
        });
    });//end document.ready function
</script>
