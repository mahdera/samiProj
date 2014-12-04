<?php
	session_start();
	require_once 'form1.php';
	require_once 'form1q3.php';
	require_once 'form1q4.php';
	require_once 'user.php';
	require_once 'usersubdistrict.php';

	$titleValue = addslashes($_POST['titleValue']);
	$dateValue = $_POST['dateValue'];
  $planValue = addslashes($_POST['planValue']);
  $q1Value = addslashes($_POST['q1Value']);
  $q2Value = addslashes($_POST['q2Value']);
	$id = $_POST['id'];
	$q3NumRows = $_POST['q3NumRows'];
	$q4NumRows = $_POST['q4NumRows'];

	$userObj = getUser($_SESSION['LOGGED_USER_ID']);

	if($userObj->user_level == '02'){
		updateForm1($id, $titleValue, $dateValue, $planValue, $q1Value, $q2Value, $_SESSION['LOGGED_USER_ID']);
	}else if($userObj->user_level == '01'){
		$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
		if(!empty($userObj)){
			updateForm1($id, $titleValue, $dateValue, $planValue, $q1Value, $q2Value, $userObj->id);
		}
	}
	//now do the form update for q3 and q4...clear both q3 and q4 tables for the passed form1 id
	clearQ3ValuesForForm1($id);
	clearQ4ValuesForForm1($id);

	for($i=1; $i <= $q3NumRows; $i++){
			$textBoxCol1Id = "txteditrowq3" . $i . 1;
			$textBoxCol2Id = "txteditrowq3" . $i . 2;
			$textBoxCol3Id = "txteditrowq3" . $i . 3;
			$textBoxCol4Id = "txteditrowq3" . $i . 4;

			$textBoxCol1Val = addslashes($_POST["$textBoxCol1Id"]);
			$textBoxCol2Val = addslashes($_POST["$textBoxCol2Id"]);
			$textBoxCol3Val = addslashes($_POST["$textBoxCol3Id"]);
			$textBoxCol4Val = addslashes($_POST["$textBoxCol4Id"]);

			if($userObj->user_level == '02'){
				saveForm1Q3($id, $i, 1, $textBoxCol1Val, $_SESSION['LOGGED_USER_ID']);
				saveForm1Q3($id, $i, 2, $textBoxCol2Val, $_SESSION['LOGGED_USER_ID']);
				saveForm1Q3($id, $i, 3, $textBoxCol3Val, $_SESSION['LOGGED_USER_ID']);
				saveForm1Q3($id, $i, 4, $textBoxCol4Val, $_SESSION['LOGGED_USER_ID']);
			}else if($userObj->user_level == '01'){
				$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
				saveForm1Q3($id, $i, 1, $textBoxCol1Val, $userObj->id);
				saveForm1Q3($id, $i, 2, $textBoxCol2Val, $userObj->id);
				saveForm1Q3($id, $i, 3, $textBoxCol3Val, $userObj->id);
				saveForm1Q3($id, $i, 4, $textBoxCol4Val, $userObj->id);
			}
	}//end for loop

	for($i=1; $i <= $q4NumRows; $i++){
			$textBoxCol1Id = "txteditrowq4" . $i . 1;
			$textBoxCol2Id = "txteditrowq4" . $i . 2;
			$textBoxCol3Id = "txteditrowq4" . $i . 3;
			$textBoxCol4Id = "txteditrowq4" . $i . 4;

			$textBoxCol1Val = addslashes($_POST["$textBoxCol1Id"]);
			$textBoxCol2Val = addslashes($_POST["$textBoxCol2Id"]);
			$textBoxCol3Val = addslashes($_POST["$textBoxCol3Id"]);
			$textBoxCol4Val = addslashes($_POST["$textBoxCol4Id"]);

			if($userObj->user_level == '02'){
				saveForm1Q4($id, $i, 1, $textBoxCol1Val, $_SESSION['LOGGED_USER_ID']);
				saveForm1Q4($id, $i, 2, $textBoxCol2Val, $_SESSION['LOGGED_USER_ID']);
				saveForm1Q4($id, $i, 3, $textBoxCol3Val, $_SESSION['LOGGED_USER_ID']);
				saveForm1Q4($id, $i, 4, $textBoxCol4Val, $_SESSION['LOGGED_USER_ID']);
			}else if($userObj->user_level == '01'){
				$userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
				saveForm1Q4($id, $i, 1, $textBoxCol1Val, $userObj->id);
				saveForm1Q4($id, $i, 2, $textBoxCol2Val, $userObj->id);
				saveForm1Q4($id, $i, 3, $textBoxCol3Val, $userObj->id);
				saveForm1Q4($id, $i, 4, $textBoxCol4Val, $userObj->id);
			}
	}//end for loop
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form1 Updated Successfully!</div>
