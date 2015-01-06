<?php
require_once '../PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

// New portrait section
$section = $PHPWord->createSection();

////////////////////////////////////////////////////////////////////////////////////
$fontStyle = array('spaceAfter'=>60, 'size'=>12);
$fontStyleTOC = array('spaceAfter'=>30, 'size'=>8);

$fontGoalStyle = array('size'=>10, 'color'=>'333333', 'bold'=>true);
$fontFunctionStyle = array('size'=>10, 'color'=>'333333', 'bold'=>true);


$PHPWord->addTitleStyle(1, array('size'=>16, 'color'=>'333333', 'bold'=>true));
$PHPWord->addTitleStyle(2, array('size'=>14, 'color'=>'666666', 'bold'=>true));
$PHPWord->addTitleStyle(3, array('size'=>12, 'color'=>'666666', 'bold'=>true));
$PHPWord->addTitleStyle(4, array('size'=>10, 'color'=>'666666'));
$PHPWord->addTitleStyle(5, array('size'=>8, 'color'=>'666666'));

//
// Define table style arrays//---------------------------------------------
// Define table style arrays
$styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);
$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');

// Define cell style arrays
$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Define font style for first row
$fontStyle = array('bold'=>true, 'align'=>'center');

// Add table style
$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);

//////////-----------------------------------------------------------------
// Add text elements
$section->addText('Table of Contents:');
$section->addTextBreak(2);
// Add TOC
  $section->addTOC($fontStyleTOC,null,1,3);
  $section->addPageBreak();
// Add Titles

///

	session_start();
	$id = $_GET['id'];
	require_once '../../files/goalfirst.php';
	require_once '../../files/form1.php';
	require_once '../../files/form1q3.php';
	require_once '../../files/form1q4.php';
	require_once '../../files/th.php';
	require_once '../../files/form2.php';
	require_once '../../files/form3.php';
	require_once '../../files/form4.php';
	require_once '../../files/form5.php';
	require_once '../../files/form6.php';
	require_once '../../files/form7.php';
	require_once '../../files/form8.php';
	require_once '../../files/form9.php';
	require_once '../../files/form10.php';
	require_once '../../files/goalfirstg1.php';
	require_once '../../files/goalfirstg1objfn.php';
	require_once '../../files/goalfirstg2.php';
	require_once '../../files/goalfirstg2objfn.php';
	require_once '../../files/goalfirstg3.php';
	require_once '../../files/goalfirstg3objfn.php';
	require_once '../../files/fn.php';
	require_once '../../files/thaction.php';
	require_once '../../files/goalsecond.php';
	require_once '../../files/goalsecondg1.php';
	require_once '../../files/goalsecondg1obj.php';
	require_once '../../files/goalsecondg2.php';
	require_once '../../files/goalsecondg2obj.php';
	require_once '../../files/goalsecondg3.php';
	require_once '../../files/goalsecondg3obj.php';
	require_once '../../files/fnaction.php';
	require_once '../../files/goalfirstth.php';
	require_once '../../files/goalsecondfn.php';
	require_once '../../files/user.php';
	require_once '../../files/usersubdistrict.php';

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	//start showing the report from form1 upto form10
	$goalFirstObj = getGoalFirst($id);
	$goalFirstId = $goalFirstObj->id;
	$goalFirstG1Id;

    $section->addTitle('Basic Plan', 1);
	//now get a form1 obj modified by the logged in user and modification date same as that of the goal first...
	//$form1Obj = getLatestForm1ModifiedByUser($_SESSION['LOGGED_USER_ID']);
		$form1Obj = null;
		//STOPPED WORKING HERE.....
		if($userObj->user_level == '01'){
			$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
			if(!empty($userObject)){
				$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
				$form1Obj = getLatestForm1ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
			}
		}else if($userObj->user_level == '02'){
			$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
			$form1Obj = getLatestForm1ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
		}
        $section->addTitle('1. Introductory Material', 2);
        $section->addTitle('1.1 Promulgation Document and Signatures', 3);
		if($form1Obj){
            $section->addText($form1Obj->q1);
        }
        $section->addTitle('1.2 Approval and Implementation', 3);
		if($form1Obj){
            $section->addText($form1Obj->q2);
        }
		$section->addTitle('1.3 Record of Changes', 3);
            $table = $section->addTable('myOwnTableStyle');
            // Add row
            $table->addRow(900);
            // Add cells
            //$table->addCell(2000, $styleCell)->addText('Change Number', $fontStyle);
            //$table->addCell(2000, $styleCell)->addText('Date of Change', $fontStyle);
            //$table->addCell(2000, $styleCell)->addText('Name', $fontStyle);
            $table->addCell(2000, $styleCell)->addText('Summary of Change', $fontStyle);
 		    if($form1Obj){
  				//--tab;e----------------------------------------------------
				// Add table

                //$section->addTitle('1.4 Record of Distribution', 3);
                //$table = $section->addTable('myOwnTableStyle');
                // Add row
                //$table->addRow(900);
                // Add cells
                //$table->addCell(2000, $styleCell)->addText('Title and name of person receiving the plan', $fontStyle);
                $form1Q3List = getAllForm1Q3ForThisForm1($form1Obj->id);
                $colCount = 1;
                while($form1Q3Row = mysql_fetch_object($form1Q3List)){
                    //$textBoxId = "txtrowq4" . $form1Q4Row->row . $form1Q4Row->col;
                    $table->addCell(2000)->addText($form1Q3Row->column_value);
                    $colCount++;
                }

				/*$form1Q3List = getAllForm1Q3ForThisForm1($form1Obj->id);
				$colCount = 1;
				while($form1Q3Row = mysql_fetch_object($form1Q3List)){
						$textBoxId = "txtrowq3" . $form1Q3Row->row . $form1Q3Row->col;
						$table->addRow();
						$table->addCell(2000)->addText($form1Q3Row->column_value);
/*						if($colCount == 1){
						echo "<tr>";
						}if($colCount < 4){
							?>
								<td width="25%"><?php echo $form1Q3Row->column_value;?></td>
							<?php
						}if($colCount == 4){
							?>
								<td width="25%"><?php echo $form1Q3Row->column_value;?></td>
							<?php
							$colCount = 0;
							echo "</tr>";
						}
						$colCount++;
				}//end while loop*/

 				//--table-------------------------------------------------------

                    $section->addTitle('1.4 Record of Distribution', 3);
                    $table = $section->addTable('myOwnTableStyle');
                    // Add row
                    $table->addRow(900);
                    // Add cells
                    $table->addCell(2000, $styleCell)->addText('Title and name of person receiving the plan', $fontStyle);
					$form1Q4List = getAllForm1Q4ForThisForm1($form1Obj->id);
					$colCount = 1;
					while($form1Q4Row = mysql_fetch_object($form1Q4List)){
							$textBoxId = "txtrowq4" . $form1Q4Row->row . $form1Q4Row->col;
                            $table->addCell(2000)->addText($form1Q4Row->column_value);
                            $colCount++;
                    }
                }//end for1obj checking if condition
                //----------------------------------------------------------------------------------------------
 				//$form2Obj = getForm2ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				$form2Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form2Obj = getForm2ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form2Obj = getForm2ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
				}

                $section->addTitle('2. Purpose, Scope, Situation Overview and Assumptions', 2);
                $section->addTitle('2.1 Purpose', 3);
				if($form2Obj){
                     $section->addText($form2Obj->q2_1);
                }
                $section->addTitle('2.2 Scope', 3);
				if($form2Obj){
                     $section->addText($form2Obj->q2_2);
                }
                $section->addTitle('2.3 Situation Overview', 3);
				if($form2Obj){
                    $section->addText($form2Obj->q2_3);
                }
                $section->addTitle('2.4 Planning Assumptions', 3);
				if($form2Obj){
                    $section->addText('Please fill this section, when available.');
                }

        //--------------------------------------------------------------------------------------------------
				//$form3Obj = getForm3ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				$form3Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form3Obj = getForm3ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form3Obj = getForm3ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
				}
                $section->addTitle('3. Concept of Operations (CONOPS)', 2);
				if($form3Obj){
                    $section->addText($form3Obj->q3_1);
                }
 //-----------------------------------------------------------------------------------------------------

				//$form4Obj = getForm4ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				$form4Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form4Obj = getForm4ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form4Obj = getForm4ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
				}
                $section->addTitle('4. Organization and Assignment of Responsibilities', 2);
				if($form4Obj){
                    $section->addText($form4Obj->q4_1);
                }
    //-----------------------------------------------------------------------------------------------------
 				//$form5Obj = getForm5ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				$form5Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form5Obj = getForm5ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form5Obj = getForm5ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
				}
                $section->addTitle('5. Direction, Control, and Coordination', 2);
				if($form5Obj){
                    $section->addText($form5Obj->q5_1);
                }
    //---------------------------------------------------------------------------------------------------------------

				//$form6Obj = getForm6ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				$form6Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form6Obj = getForm6ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form6Obj = getForm6ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
				}
                $section->addTitle('6. Information Collection, Analysis, and Dissemination', 2);
				if($form6Obj){
                    $section->addText($form6Obj->q6_1);
                }
    //--------------------------------------------------------------------------------------------------------------
				//$form7Obj = getForm7ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				$form7Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form7Obj = getForm7ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form7Obj = getForm7ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
				}

                $section->addTitle('7. Training and Exercises', 2);
				if($form7Obj){
                    $section->addText($form7Obj->q7_1);
                }
    //--------------------------------------------------------------------------------------------
 				//$form8Obj = getForm8ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				$form8Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form8Obj = getForm8ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form8Obj = getForm8ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
                    }
                $section->addTitle('8. Administration, Finance, and Logistics', 2);
				if($form8Obj){
                    $section->addText( $form8Obj->q8_1);
                }
    //---------------------------------------------------------------------------------------------
				//$form9Obj = getForm9ModifiedByUserOnThisDate($_SESSION['LOGGED_USER_ID'], $goalFirstObj->modification_date);
				$form9Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form9Obj = getForm9ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form9Obj = getForm9ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
                    }

                $section->addTitle('9. Plan Development and Maintenance', 2);
				if($form9Obj){
                    $section->addText($form9Obj->q9_1);
                }
    //---------------------------------------------------------------------------------------------------------
				$form10Obj = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$form10Obj = getForm10ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$form10Obj = getForm10ModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
				}
                $section->addTitle('10. Authorities and References', 2);
				if($form10Obj){
                    $section->addText($form10Obj->q10_1);
                }
    //---------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------
                 $fnIdArray = array();
                 $section->addTitle('Functional Annexes', 1);
                 //Here I need to call that majic function...
                 if($userObj->user_level == '02'){
                     $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                     $fnIdArray = getAllFilteredSelectedThFnIds($_SESSION['SELECTED_THS'], $userSubDistrictObj->sub_district_id);
                 }else if($userObj->user_level == '01'){
                     $userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                     if(!empty($userObject)){
                         $userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
                         $fnIdArray = getAllFilteredSelectedThFnIds($_SESSION['SELECTED_THS'], $_SESSION['SUB_DISTRICT_ID']);
                     }
                 }

                 for($i=0; $i<count($fnIdArray); $i++){
                     //for each fnId, get the fn action text
                     $fnActionResult = getTopFnActionsForThisFn($fnIdArray[$i]);
                     while($fnActionRow = mysql_fetch_object($fnActionResult)){
                         $section->addText($fnActionRow->action_text);
                     }//end while loop
                 }//end for loop

      //---------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------
                 $section->addTitle('Threat or Hazard-Specific Annexes', 1)  ;
                 $goalFirstThList = getAllGoalFirstThsForThisGoalFirst($id);

				//first get all goalFirstThLists associated with the selected goalFirst record...
				$goalFirstThList = getAllGoalFirstThsForThisGoalFirst($id);
				while($goalFirstThRow = mysql_fetch_object($goalFirstThList)){
						$thObj = getTh($goalFirstThRow->th_id);
                        //Threat
                        $section->addTitle($thObj->th_name, 2) ;

                        $goalFirstG1Row = getGoalFirstG1ForGoalFirstThId($goalFirstThRow->id);

													if(!empty($goalFirstG1Row)){
															$fn_row = getFn($goalFirstG1Row->fn_id);
                                                            $section->addTitle('Goal 1 (Before)', 3);
                                                            $section->addText($goalFirstG1Row->g1);
                                                            $section->addTitle('Functions', 4) ;
                                                            $section->addText($fn_row->fn_name);

																	//now get all the obj fn values for this particular goalFirstG1Id
																	$goalFirstG1ObjFnList = getAllGoalFirstG1ObjFnsForThisGoalFirstG1Id($goalFirstG1Row->id);
																	if(!empty($goalFirstG1ObjFnList)){
																			while($goalFirstG1ObjFnRow = mysql_fetch_object($goalFirstG1ObjFnList)){
																					$fn_row = getFn($goalFirstG1ObjFnRow->fn_id);

                                                                                    $section->addTitle('Objectives', 5) ;
                                                                                    $section->addText($goalFirstG1ObjFnRow->obj);
                                                                                    $section->addTitle('Functions', 5);
                                                                                    $section->addText($fn_row->fn_name);

																			}//end while loop
																	}//end if condition for goalFirstG1ObjFnList
                                                    }
                                                    //goal---------------------------------------------

													$goalFirstG2Row = getGoalFirstG2ForGoalFirstThId($goalFirstThRow->id);

													if(!empty($goalFirstG2Row)){
                                                            $section->addTitle('Goal 2 (During)', 3);
                                                            $section->addText($goalFirstG2Row->g2);
                                                            $fn_row = getFn($goalFirstG2Row->fn_id);

                                                            $section->addTitle('Functions', 4);
                                                            $section->addText($fn_row->fn_name);

 																	//now get all the obj fn values for this particular goalFirstG1Id
																	$goalFirstG2ObjFnList = getAllGoalFirstG2ObjFnsForThisGoalFirstG2Id($goalFirstG2Row->id);
																	if(!empty($goalFirstG2ObjFnList)){
																			while($goalFirstG2ObjFnRow = mysql_fetch_object($goalFirstG2ObjFnList)){
																					$fn_row = getFn($goalFirstG2ObjFnRow->fn_id);

                                                                                    $section->addTitle('Objectives', 5);
                                                                                    $section->addText($goalFirstG2ObjFnRow->obj) ;
                                                                                    $section->addTitle('Functions', 5);
                                                                                    $section->addText($fn_row->fn_name) ;

																			}//end while loop
																	}//end if condition for goalFirstG1ObjFnList
                                                        //--------------------------------------------

													}//end empty checking for goalFirstG1List
                                                    //--Goal  After---------------------------------------------------------

													$goalFirstG3Row = getGoalFirstG3ForGoalFirstThId($goalFirstThRow->id);

													if(!empty($goalFirstG3Row)){
															$fn_row = getFn($goalFirstG3Row->fn_id);
                                                            $section->addTitle('Goal 3 (After)', 3);
                                                            $section->addText($goalFirstG3Row->g3);

                                                            $section->addTitle('Functions', 4);
                                                            $section->addText($fn_row->fn_name);


																//now get all the obj fn values for this particular goalFirstG1Id
																	$goalFirstG3ObjFnList = getAllGoalFirstG3ObjFnsForThisGoalFirstG3Id($goalFirstG3Row->id);
																	if(!empty($goalFirstG3ObjFnList)){
																			while($goalFirstG3ObjFnRow = mysql_fetch_object($goalFirstG3ObjFnList)){
																					$fn_row = getFn($goalFirstG3ObjFnRow->fn_id);

                                                                                    $section->addTitle('Objectives', 5) ;
                                                                                    $section->addText($goalFirstG3ObjFnRow->obj) ;
                                                                                    $section->addTitle('Functions', 5) ;
                                                                                    $section->addText($fn_row->fn_name)  ;

																			}//end while loop
																	}//end if condition for goalFirstG1ObjFnList

													}//end empty checking for goalFirstG1List


						   /*	now get the th action for this particular thId   */
                           $section->addTitle('Courses of Action', 3);
 									//get the thActionList for this particular th object...
									$thActionList = getAllThActionsForThisTh($thObj->id);
																while($thActionRow = mysql_fetch_object($thActionList)){
																    $section->addListItem(stripslashes($thActionRow->action_text), 0);

																}//end action while loop
				}//end goalFirstThList while loop -- here is the boundary for Th...
    //---------------------------------------------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------------------------------
				//$latestGoalSecondRow = getTheLatestGoalSecondRecordModifiedBy($_SESSION['LOGGED_USER_ID']);
				$goalSecondListByUser = null;
				if($userObj->user_level == '01'){
					$userObject = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
					if(!empty($userObject)){
						$userSubDistrictObj = getSubDistrictInfoForUser($userObject->id);
						$goalSecondListByUser = getAllGoalSecondsModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
					}
				}else if($userObj->user_level == '02'){
					$userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
					$goalSecondListByUser = getAllGoalSecondsModifiedByUserUsingLevel('02', $userSubDistrictObj->sub_district_id);
				}
				//$goalSecondListByUser = getAllGoalSecondsModifiedBy($_SESSION['LOGGED_USER_ID']);
				while($latestGoalSecondRow = mysql_fetch_object($goalSecondListByUser)){
				//now get list of goalSecondFnList for this particular goal-second-id
				$goalSecondFnList = getAllGoalSecondFnsForThisGoalSecondId($latestGoalSecondRow->id);

						while($goalSecondFnRow = mysql_fetch_object($goalSecondFnList)){
								$fnObj = getFn($goalSecondFnRow->fn_id);
                                $section->addTitle($fnObj->fn_name, 2) ;
    								$goalSecondG1Row = getGoalSecondG1ForGoalSecondFnId($goalSecondFnRow->id);
    								if(!empty($goalSecondG1Row)){
    										$goalSecondG1Id = $goalSecondG1Row->id;
                                            $section->addTitle('Goal 1 (Before):', 3) ;
                                            $section->addText($goalSecondG1Row->g1) ;

    										$goalSecondG1ObjList = getAllGoalSecondG1ObjsForThisGoalSecondG1Id($goalSecondG1Id);
    										if(!empty($goalSecondG1ObjList)){
    												while($goalSecondG1ObjRow = mysql_fetch_object($goalSecondG1ObjList)){
    														$goalSecondG1ObjId = $goalSecondG1ObjRow->id;

                                                            $section->addTitle('Objectives', 4) ;
                                                            $section->addText($goalSecondG1ObjRow->obj);

    												}//end while loop
    										}//end empty checking inner if condition
    								}//end if empty checking condition
                            }
                }









/////////////////////////////


$file = 'EOP.docx';
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename="' . $file . '"');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');
//$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2013');
$xmlWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$xmlWriter->save("php://output");
?>
