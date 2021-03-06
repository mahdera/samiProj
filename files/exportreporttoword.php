<?php
	session_start();
	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=document_name.doc");

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
	require_once 'thaction.php';
	require_once 'goalsecond.php';
	require_once 'goalsecondg1.php';
	require_once 'goalsecondg1obj.php';
	require_once 'goalsecondg2.php';
	require_once 'goalsecondg2obj.php';
	require_once 'goalsecondg3.php';
	require_once 'goalsecondg3obj.php';
	require_once 'fnaction.php';
	require_once 'goalfirstth.php';
	require_once 'goalsecondfn.php';

	//start showing the report from form1 upto form10
	$goalFirstObj = getGoalFirst($id);
	$goalFirstId = $goalFirstObj->id;
	$goalFirstG1Id;
	?>
	<div id="printReportDiv">
	<?php
	//now get a form1 obj modified by the logged in user and modification date same as that of the goal first...
	$form1Obj = getLatestForm1ModifiedByUser($_SESSION['LOGGED_USER_ID']);
		if($form1Obj){
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

						?>
					</table>
				</td>
			</tr>
		</table>
		<?php
	}//end empty checker for form1obj
		?>
		<table border="0" width="100%">
			<?php
				$form2Obj = getForm2ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				if($form2Obj){
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
		<?php
	}//end empty form2Obj checker
		?>
		<table border="0" width="100%">
			<?php
				$form3Obj = getForm3ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
			?>
			<tr>
				<td width="20%">Q3.1:</td>
				<td>
					<?php
						if(!empty($form3Obj)){
							echo $form3Obj->q3_1;
						}
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
						if(!empty($form4Obj)){
							echo $form4Obj->q4_1;
						}
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
						if(!empty($form5Obj)){
							echo $form5Obj->q5_1;
						}
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
						if(!empty($form6Obj)){
							echo $form6Obj->q6_1;
						}
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
						if(!empty($form7Obj)){
							echo $form7Obj->q7_1;
						}
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
						if(!empty($form8Obj)){
							echo $form8Obj->q8_1;
						}
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
				<td><?php
					if(!empty($form9Obj)){
						echo $form9Obj->q9_1;
					}
					?>
				</td>
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
						if(!empty($form10Obj)){
							echo $form10Obj->q10_1;
						}
					?>
				</td>
			</tr>
		</table>
		<!--start displaying all Ths-->
		<table border="0" width="100%">
		<?php
				//first get all goalFirstThLists associated with the selected goalFirst record...
				$goalFirstThList = getAllGoalFirstThsForThisGoalFirst($id);
				while($goalFirstThRow = mysql_fetch_object($goalFirstThList)){
						$thObj = getTh($goalFirstThRow->th_id);
						?>
							<tr>
									<td>
											<?php echo $thObj->th_name;?>
									</td>
							</tr>
							<!--now for each Th record show all the details here-->
							<tr>
									<td>
											<table border="0" width="100%">
													<?php
													$goalFirstG1Row = getGoalFirstG1ForGoalFirstThId($goalFirstThRow->id);

													if(!empty($goalFirstG1Row)){
															$fn_row = getFn($goalFirstG1Row->fn_id);
															?>
															<tr>
																	<td width="30%"></td>
																	<td width="30%">G1</td>
																	<td><?php echo $goalFirstG1Row->g1;?></td>
															</tr>
															<tr>
																	<td width="30%"></td>
																	<td width="30%">Fn</td>
																	<td><?php echo $fn_row->fn_name;?></td>
															</tr>
															<?php
																	//now get all the obj fn values for this particular goalFirstG1Id
																	$goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($goalFirstG1Row->id);
																	if(!empty($goalFirstG1ObjFnList)){
																			while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
																					$fn_row = getFn($goalFirstG1ObjFnRow->fn_id);
																					?>
																					<tr>
																							<td width="30%"></td>
																							<td width="30%">Obj</td>
																							<td><?php echo $goalFirstG1ObjFnRow->obj;?></td>
																					</tr>
																					<tr>
																							<td width="30%"></td>
																							<td width="30%">Fn</td>
																							<td><?php echo $fn_row->fn_name;?></td>
																					</tr>
																					<?php
																			}//end while loop
																	}//end if condition for goalFirstG1ObjFnList
															?>
															<?php
													}//end empty checking for goalFirstG1List

													?>
											</table>
											<!--doing the samething for goalfirstg2...-->
											<table border="0" width="100%">
													<?php
													$goalFirstG2Row = getGoalFirstG2ForGoalFirstThId($goalFirstThRow->id);

													if(!empty($goalFirstG2Row)){
															$fn_row = getFn($goalFirstG2Row->fn_id);
															?>
															<tr>
																	<td width="30%"></td>
																	<td width="30%">G2</td>
																	<td><?php echo $goalFirstG2Row->g2;?></td>
															</tr>
															<tr>
																	<td width="30%"></td>
																	<td width="30%">Fn</td>
																	<td><?php echo $fn_row->fn_name;?></td>
															</tr>
															<?php
																	//now get all the obj fn values for this particular goalFirstG1Id
																	$goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($goalFirstG2Row->id);
																	if(!empty($goalFirstG2ObjFnList)){
																			while($goalFirstG2ObjFnRow = mysql_fetch_object($goalFirstG2ObjFnList)){
																					$fn_row = getFn($goalFirstG2ObjFnRow->fn_id);
																					?>
																					<tr>
																							<td width="30%"></td>
																							<td width="30%">Obj</td>
																							<td><?php echo $goalFirstG2ObjFnRow->obj;?></td>
																					</tr>
																					<tr>
																							<td width="30%"></td>
																							<td width="30%">Fn</td>
																							<td><?php echo $fn_row->fn_name;?></td>
																					</tr>
																					<?php
																			}//end while loop
																	}//end if condition for goalFirstG1ObjFnList
															?>
															<?php
													}//end empty checking for goalFirstG1List

													?>
											</table>
											<!--doing the samething for goalfirstg3...-->
											<table border="0" width="100%">
													<?php
													$goalFirstG3Row = getGoalFirstG3ForGoalFirstThId($goalFirstThRow->id);

													if(!empty($goalFirstG3Row)){
															$fn_row = getFn($goalFirstG3Row->fn_id);
															?>
															<tr>
																	<td width="30%"></td>
																	<td width="30%">G3</td>
																	<td><?php echo $goalFirstG3Row->g3;?></td>
															</tr>
															<tr>
																	<td width="30%"></td>
																	<td width="30%">Fn</td>
																	<td><?php echo $fn_row->fn_name;?></td>
															</tr>
															<?php
																	//now get all the obj fn values for this particular goalFirstG1Id
																	$goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($goalFirstG3Row->id);
																	if(!empty($goalFirstG3ObjFnList)){
																			while($goalFirstG3ObjFnRow = mysql_fetch_object($goalFirstG3ObjFnList)){
																					$fn_row = getFn($goalFirstG3ObjFnRow->fn_id);
																					?>
																					<tr>
																							<td width="30%"></td>
																							<td width="30%">Obj</td>
																							<td><?php echo $goalFirstG3ObjFnRow->obj;?></td>
																					</tr>
																					<tr>
																							<td width="30%"></td>
																							<td width="30%">Fn</td>
																							<td><?php echo $fn_row->fn_name;?></td>
																					</tr>
																					<?php
																			}//end while loop
																	}//end if condition for goalFirstG1ObjFnList
															?>
															<?php
													}//end empty checking for goalFirstG1List

													?>
											</table>
									</td>
							</tr>
							<!--now get the th action for this particular thId-->
							<?php
									//get the thActionList for this particular th object...
									$thActionList = getAllThActionsForThisTh($thObj->id);
							?>
							<tr>
									<td>
												<table border="0" width="100%">
														<?php
																while($thActionRow = mysql_fetch_object($thActionList)){
																		?>
																				<tr>
																						<td width="10%">Action:</td>
																						<td>
																								<?php echo $thActionRow->action_text;?>
																						</td>
																				</tr>
																		<?php
																}//end action while loop
														?>
												</table>
									</td>
							</tr>
						<?php
				}//end goalFirstThList while loop -- here is the boundary for Th...
		?>
		</table>
		<!--now get the latest goal-second record from the database saved by the logged in user-->
		<?php
				$latestGoalSecondRow = getTheLatestGoalSecondRecordModifiedBy($_SESSION['LOGGED_USER_ID']);
				//now get list of goalSecondFnList for this particular goal-second-id
				$goalSecondFnList = getAllGoalSecondFnsForThisGoalSecondId($latestGoalSecondRow->id);
		?>
		<table border="0" width="100%">
				<?php
						while($goalSecondFnRow = mysql_fetch_object($goalSecondFnList)){
								$fnObj = getFn($goalSecondFnRow->fn_id);
								?>
										<tr>
												<td>
														<?php echo $fnObj->fn_name;?>
												</td>
										</tr>
										<tr>
												<td>
														<table border="0" width="100%">
																<?php
																		$goalSecondG1Row = getGoalSecondG1ForGoalSecondFnId($goalSecondFnRow->id);
																		if(!empty($goalSecondG1Row)){
																				$goalSecondG1Id = $goalSecondG1Row->id;
																		?>
																				<tr>
																						<td width="30%"></td>
																						<td width="30%">G1</td>
																						<td>
																								<?php echo $goalSecondG1Row->g1;?>
																						</td>
																				</tr>
																		<?php
																				$goalSecondG1ObjList = getAllGoalSecondG1ObjsForThisGoalSecondG1Id($goalSecondG1Id);
																				if(!empty($goalSecondG1ObjList)){
																						while($goalSecondG1ObjRow = mysql_fetch_object($goalSecondG1ObjList)){
																								$goalSecondG1ObjId = $goalSecondG1ObjRow->id;
																								?>
																										<tr>
																												<td></td>
																												<td>Obj</td>
																												<td>
																														<?php echo $goalSecondG1ObjRow->obj;?>
																												</td>
																										</tr>
																								<?php
																						}//end while loop
																				}//end empty checking inner if condition
																		}//end if empty checking condition
																?>
														</table>

														<table border="0" width="100%">
																<?php
																		$goalSecondG2Row = getGoalSecondG2ForGoalSecondFnId($goalSecondFnRow->id);
																		if(!empty($goalSecondG2Row)){
																				$goalSecondG2Id = $goalSecondG2Row->id;
																		?>
																				<tr>
																						<td width="30%"></td>
																						<td width="30%">G2</td>
																						<td>
																								<?php echo $goalSecondG2Row->g2;?>
																						</td>
																				</tr>
																		<?php
																				$goalSecondG2ObjList = getAllGoalSecondG2ObjsForThisGoalSecondG2Id($goalSecondG2Id);
																				if(!empty($goalSecondG2ObjList)){
																						while($goalSecondG2ObjRow = mysql_fetch_object($goalSecondG2ObjList)){
																								$goalSecondG2ObjId = $goalSecondG2ObjRow->id;
																								?>
																										<tr>
																												<td></td>
																												<td>Obj</td>
																												<td>
																														<?php echo $goalSecondG2ObjRow->obj;?>
																												</td>
																										</tr>
																								<?php
																						}//end while loop
																				}//end empty checking inner if condition
																		}//end if empty checking condition
																?>
														</table>

														<table border="0" width="100%">
																<?php
																		$goalSecondG3Row = getGoalSecondG3ForGoalSecondFnId($goalSecondFnRow->id);
																		if(!empty($goalSecondG3Row)){
																				$goalSecondG3Id = $goalSecondG3Row->id;
																		?>
																				<tr>
																						<td width="30%"></td>
																						<td width="30%">G3</td>
																						<td>
																								<?php echo $goalSecondG3Row->g3;?>
																						</td>
																				</tr>
																		<?php
																				$goalSecondG3ObjList = getAllGoalSecondG3ObjsForThisGoalSecondG3Id($goalSecondG3Id);
																				if(!empty($goalSecondG3ObjList)){
																						while($goalSecondG3ObjRow = mysql_fetch_object($goalSecondG3ObjList)){
																								$goalSecondG3ObjId = $goalSecondG3ObjRow->id;
																								?>
																										<tr>
																												<td></td>
																												<td>Obj</td>
																												<td>
																														<?php echo $goalSecondG3ObjRow->obj;?>
																												</td>
																										</tr>
																								<?php
																						}//end while loop
																				}//end empty checking inner if condition
																		}//end if empty checking condition
																?>
														</table>

												</td>
										</tr>
										<!--here for each fn obj find the fn-action and display the result to the user...-->
										<?php
												$fnActionList = getAllFnActionsForThisFn($fnObj->id);
										?>
										<tr>
												<td>
														<table border="0" width="100%">
																<?php
																		while($fnActionRow = mysql_fetch_object($fnActionList)){
																				?>
																						<tr>
																								<td>Action:</td>
																								<td><?php echo $fnActionRow->action_text;?></td>
																						</tr>
																				<?php
																		}//end fn_action while loop
																?>
														</table>
												</td>
										</tr>
								<?php
						}//end goal second fn list-while loop
				?>
		</table>
	</div><!--end printDiv-->
