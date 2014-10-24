<?php
	session_start();
	//require_once('../msdocgenerator/clsMsDocGenerator.php');
	//$doc = new clsMsDocGenerator();
	//$doc->setFontFamily('Times New Roman');
	//$doc->setFontSize('14');

	//$doc->startTable(NULL, 'tableGrid');

	$id = $_GET['id'];
	require_once 'goalfirst.php';
	require_once 'form1.php';
	require_once 'form1q3.php';
	require_once 'form1q4.php';
	require_once 'th.php';
	require_once 'form2.php';
	require_once 'form3.php';
	require_once 'form4.php';
	require_once 'form5.php';
	require_once 'form6.php';
	require_once 'form7.php';
	require_once 'form8.php';
	require_once 'form9.php';
	require_once 'form10.php';
	require_once 'goalfirstg1.php';
	require_once 'goalfirstg1objfn.php';
	require_once 'goalfirstg2.php';
	require_once 'goalfirstg2objfn.php';
	require_once 'goalfirstg3.php';
	require_once 'goalfirstg3objfn.php';
	require_once 'fn.php';
	//start showing the report from form1 upto form10
	$goalFirstObj = getGoalFirst($id);
	$goalFirstId = $goalFirstObj->id;
	$goalFirstG1Id;
	//now get a form1 obj modified by the logged in user and modification date same as that of the goal first...
	$form1Obj = getForm1ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
	if(!empty($form1Obj)){
		?>
		<div id="printReportDiv">
		<table border="0" width="100%">
			<tr>
				<td colspan="2">
					<h1 style="text-align: center">Report</h1>
				</td>
			</tr>
			<tr>
				<td width="20%">Title:</td>
				<td><?php echo $form1Obj->title;?></td>
			</tr>
			<tr>
				<td>Date:</td>
				<td><?php echo $form1Obj->modification_date;?></td>
			</tr>
			<tr>
				<td>Plan:</td>
				<td><?php echo $form1Obj->plan;?></td>
			</tr>
			<tr>
				<td>Q1:</td>
				<td><?php echo $form1Obj->q1;?></td>
			</tr>
			<tr>
				<td>Q2:</td>
				<td><?php echo $form1Obj->q2;?></td>
			</tr>
			<tr>
				<td>Q3:</td>
				<td>
					<table border="0" width="100%">
						<?php
							$form1Q3List = getAllForm1Q3ForThisForm1($form1Obj->id);
							if(!empty($form1Q3List)){
								while($form1Q3Row = mysql_fetch_object($form1Q3List)){
								?>
									<tr>
										<td><?php echo $form1Q3Row->col1;?></td>
										<td><?php echo $form1Q3Row->col2;?></td>
										<td><?php echo $form1Q3Row->col3;?></td>
										<td><?php echo $form1Q3Row->col4;?></td>
										<td><?php echo $form1Q3Row->col5;?></td>
										<td><?php echo $form1Q3Row->col6;?></td>
									</tr>
								<?php
								}//end while loop
							}//end if condition
						?>
					</table>
				</td>
			</tr>
			<tr>
				<td>Q4:</td>
				<td>
					<table border="0" width="100%">
						<?php
							$form1Q4List = getAllForm1Q4ForThisForm1($form1Obj->id);
							if(!empty($form1Q4List)){
								while($form1Q4Row = mysql_fetch_object($form1Q4List)){
								?>
									<tr>
										<td width="20%"><?php echo $form1Q4Row->col1;?></td>
										<td><?php echo $form1Q4Row->col2;?></td>
										<td><?php echo $form1Q4Row->col3;?></td>
										<td><?php echo $form1Q4Row->col4;?></td>
										<td><?php echo $form1Q4Row->col5;?></td>
										<td><?php echo $form1Q4Row->col6;?></td>
									</tr>
								<?php
								}//end while loop
							}//end if condition
						?>
					</table>
				</td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form2Obj = getForm2ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q2.1:</td>
				<td><?php if(!empty($form2Obj))echo $form2Obj->q2_1;?></td>
			</tr>
			<tr>
				<td>Q2.2:</td>
				<td><?php if(!empty($form2Obj))echo $form2Obj->q2_2;?></td>
			</tr>
			<tr>
				<td>Q2.3:</td>
				<td><?php if(!empty($form2Obj))echo $form2Obj->q2_3;?></td>
			</tr>
			<tr>
				<td>Q2.4:</td>
				<td><?php if(!empty($form2Obj))echo $form2Obj->q2_4;?></td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form3Obj = getForm3ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q3.1:</td>
				<td>
					<?php
						if(!empty($form3Obj))
							echo $form3Obj->q3_1;
					?>
				</td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form4Obj = getForm4ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q4.1:</td>
				<td>
					<?php
						if(!empty($form4Obj))
							echo $form4Obj->q4_1;
					?>
				</td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form5Obj = getForm5ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q5.1:</td>
				<td>
					<?php
						if(!empty($form5Obj))
							echo $form5Obj->q5_1;
					?>
				</td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form6Obj = getForm6ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q6.1:</td>
				<td>
					<?php
						if(!empty($form6Obj))
							echo $form6Obj->q6_1;
					?>
				</td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form7Obj = getForm7ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q7.1:</td>
				<td>
					<?php
						if(!empty($form7Obj))
							echo $form7Obj->q7_1;
					?>
				</td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form8Obj = getForm8ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q8.1:</td>
				<td>
					<?php
						if(!empty($form80Obj))
							echo $form8Obj->q8_1
					;?>
				</td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form9Obj = getForm9ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q9.1:</td>
				<td><?php echo $form9Obj->q9_1;?></td>
			</tr>
		</table>

		<table border="0" width="100%">
			<?php
				$form10Obj = getForm10ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q10.1:</td>
				<td>
					<?php
						if(!empty($form10Obj))
							echo $form10Obj->q10_1;
					?>
				</td>
			</tr>
		</table>
		<table border="0" width="100%">
		<?php
			$thList = getAllThsForGoalFirst($goalFirstObj->id);
			if(!empty($thList)){
				while($thRow = mysql_fetch_object($thList)){
					$thObj = getTh($thRow->id);
					?>
					<tr>
						<td width="20%">Th</td>
						<td><?php echo $thObj->th_name;?></td>
					</tr>
					<?php
					//now try getting the g1 and fns..
					$goalFirstG1List = getAllGoalFirstG1ForGoalFirstId($goalFirstId);
					if(!empty($goalFirstG1List)){
						while($goalFirstG1Row = mysql_fetch_object($goalFirstG1List)){
							$fnObj = getFn($goalFirstG1Row->fn_id);
							$goalFirstG1Id = $goalFirstG1Row->id;
							?>
							<tr>
								<td width="20%">G1</td>
								<td<?php echo $goalFirstG1Row->g1;?>></td>
							</tr>
							<tr>
								<td width="20%">Fn</td>
								<td><?php $fnObj->fn_name;?></td>
							</tr>
							<?php
							//now get the values for goal first obj and fn here...
							$goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($goalFirstG1Id);
							if(!empty($goalFirstG1ObjFnList)){
								while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
									$fnObj = getFn($goalFirstG1ObjFnRow->fn_id);
									?>
									<tr>
										<td width="20%">Obj:</td>
										<td><?php echo $goalFirstG1ObjFnRow->obj;?></td>
									</tr>
									<tr>
										<td width="20%">Fn:</td>
										<td><?php echo $fnObj->fn_name;?></td>
									</tr>
									<?php
								}//end inner most while loop
							}
						}//end inner while loop
					}//end if condition
				}//end while loop
			}//end if empty checker condition
		?>
		</table>

		<table border="0" width="100%">
		<?php
			$thList = getAllThsForGoalFirst($goalFirstObj->id);
			if(!empty($thList)){
				while($thRow = mysql_fetch_object($thList)){
					$thObj = getTh($thRow->id);
					?>
					<tr>
						<td width="20%">Th</td>
						<td><?php echo $thObj->th_name;?></td>
					</tr>
					<?php
					//now try getting the g1 and fns..
					$goalFirstG2List = getAllGoalFirstG2ForGoalFirstId($goalFirstId);
					if(!empty($goalFirstG2List)){
						while($goalFirstG2Row = mysql_fetch_object($goalFirstG2List)){
							$fnObj = getFn($goalFirstG2Row->fn_id);
							$goalFirstG2Id = $goalFirstG2Row->id;
							?>
							<tr>
								<td width="20%">G2</td>
								<td<?php echo $goalFirstG2Row->g2;?>></td>
							</tr>
							<tr>
								<td width="20%">Fn</td>
								<td><?php $fnObj->fn_name;?></td>
							</tr>
							<?php
							//now get the values for goal first obj and fn here...
							$goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($goalFirstG2Id);
							if(!empty($goalFirstG2ObjFnList)){
								while($goalFirstG2ObjFnRow = mysql_fetch_object($goalFirstG2ObjFnList)){
									$fnObj = getFn($goalFirstG2ObjFnRow->fn_id);
									?>
									<tr>
										<td width="20%">Obj:</td>
										<td><?php echo $goalFirstG2ObjFnRow->obj;?></td>
									</tr>
									<tr>
										<td width="20%">Fn:</td>
										<td><?php echo $fnObj->fn_name;?></td>
									</tr>
									<?php
								}//end inner most while loop
							}
						}//end inner while loop
					}//end if condition
				}//end while loop
			}//end if empty checker condition
		?>
		</table>


		<table border="0" width="100%">
		<?php
			$thList = getAllThsForGoalFirst($goalFirstObj->id);
			if(!empty($thList)){
				while($thRow = mysql_fetch_object($thList)){
					$thObj = getTh($thRow->id);
					?>
					<tr>
						<td width="20%">Th</td>
						<td><?php echo $thObj->th_name;?></td>
					</tr>
					<?php
					//now try getting the g1 and fns..
					$goalFirstG3List = getAllGoalFirstG3ForGoalFirstId($goalFirstId);
					if(!empty($goalFirstG3List)){
						while($goalFirstG3Row = mysql_fetch_object($goalFirstG3List)){
							$fnObj = getFn($goalFirstG3Row->fn_id);
							$goalFirstG3Id = $goalFirstG3Row->id;
							?>
							<tr>
								<td>G3</td>
								<td<?php echo $goalFirstG3Row->g3;?>></td>
							</tr>
							<tr>
								<td>Fn</td>
								<td><?php $fnObj->fn_name;?></td>
							</tr>
							<?php
							//now get the values for goal first obj and fn here...
							$goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($goalFirstG3Id);
							if(!empty($goalFirstG3ObjFnList)){
								while($goalFirstG3ObjFnRow = mysql_fetch_object($goalFirstG3ObjFnList)){
									$fnObj = getFn($goalFirstG3ObjFnRow->fn_id);
									?>
									<tr>
										<td width="20%">Obj:</td>
										<td><?php echo $goalFirstG3ObjFnRow->obj;?></td>
									</tr>
									<tr>
										<td>Fn:</td>
										<td><?php echo $fnObj->fn_name;?></td>
									</tr>
									<?php
								}//end inner most while loop
							}
						}//end inner while loop
					}//end if condition
				}//end while loop
			}//end if empty checker condition
		?>
		</table>
		</div>
		<table border="0" width="100%">
			<tr>
				<td align="right">
					<a href="#.jsp" onclick="printDiv('printReportDiv')"><img src="images/printer.jpg" align="absmiddle"/> Print</a>
					|
					<a href="files/exportreporttoword.php" target="_blank" id="wordReportLinkId123"><img src="images/word.jpeg" align="absmiddle"/> Generate Word Doc</a>
				</td>
			</tr>
		</table>
		<?php
		//$doc->endTable();

		//$doc->output();
	}
?>
<script type="text/javascript">
	function printDiv(divName) {
	    var printContents = document.getElementById(divName).innerHTML;
	    window.document.getElementById(divName).innerHTML = printContents;
	    window.print();
	}

	$(document).ready(function(){
		$('#wordReportLinkId').click(function(){
			var id = "<?php echo $id;?>";
			window.open('files/exportreporttoword.php?id='+id,'Report Window', 800, 600);
		});
	});//end document.ready function
</script>
