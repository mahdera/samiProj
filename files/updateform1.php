<?php
	session_start();
	require_once 'form1.php';
	require_once 'form1q3.php';
	require_once 'form1q4.php';

	@$titleValue = mysql_real_escape_string($_POST['titleValue']);
	$dateValue = $_POST['dateValue'];
  @$planValue = mysql_real_escape_string($_POST['planValue']);
  @$q1Value = mysql_real_escape_string($_POST['q1Value']);
  @$q2Value = mysql_real_escape_string($_POST['q2Value']);
	$id = $_POST['id'];
	$q3NumRows = $_POST['q3NumRows'];
	$q4NumRows = $_POST['q4NumRows'];

	updateForm1($id, $titleValue, $dateValue, $planValue, $q1Value, $q2Value, $_SESSION['LOGGED_USER_ID']);
	//now do the form update for q3 and q4...clear both q3 and q4 tables for the passed form1 id
	clearQ3ValuesForForm1($id);
	clearQ4ValuesForForm1($id);

	for($i=1; $i <= $q3NumRows; $i++){
			$textBoxCol1Id = "txteditrowq3" . $i . 1;
			$textBoxCol2Id = "txteditrowq3" . $i . 2;
			$textBoxCol3Id = "txteditrowq3" . $i . 3;
			$textBoxCol4Id = "txteditrowq3" . $i . 4;

			@$textBoxCol1Val = mysql_real_escape_string($_POST["$textBoxCol1Id"]);
			@$textBoxCol2Val = mysql_real_escape_string($_POST["$textBoxCol2Id"]);
			@$textBoxCol3Val = mysql_real_escape_string($_POST["$textBoxCol3Id"]);
			@$textBoxCol4Val = mysql_real_escape_string($_POST["$textBoxCol4Id"]);

			saveForm1Q3($id, $i, 1, $textBoxCol1Val, $_SESSION['LOGGED_USER_ID']);
			saveForm1Q3($id, $i, 2, $textBoxCol2Val, $_SESSION['LOGGED_USER_ID']);
			saveForm1Q3($id, $i, 3, $textBoxCol3Val, $_SESSION['LOGGED_USER_ID']);
			saveForm1Q3($id, $i, 4, $textBoxCol4Val, $_SESSION['LOGGED_USER_ID']);
	}//end for loop

	for($i=1; $i <= $q4NumRows; $i++){
			$textBoxCol1Id = "txteditrowq4" . $i . 1;
			$textBoxCol2Id = "txteditrowq4" . $i . 2;
			$textBoxCol3Id = "txteditrowq4" . $i . 3;
			$textBoxCol4Id = "txteditrowq4" . $i . 4;

			@$textBoxCol1Val = mysql_real_escape_string($_POST["$textBoxCol1Id"]);
			@$textBoxCol2Val = mysql_real_escape_string($_POST["$textBoxCol2Id"]);
			@$textBoxCol3Val = mysql_real_escape_string($_POST["$textBoxCol3Id"]);
			@$textBoxCol4Val = mysql_real_escape_string($_POST["$textBoxCol4Id"]);

			saveForm1Q4($id, $i, 1, $textBoxCol1Val, $_SESSION['LOGGED_USER_ID']);
			saveForm1Q4($id, $i, 2, $textBoxCol2Val, $_SESSION['LOGGED_USER_ID']);
			saveForm1Q4($id, $i, 3, $textBoxCol3Val, $_SESSION['LOGGED_USER_ID']);
			saveForm1Q4($id, $i, 4, $textBoxCol4Val, $_SESSION['LOGGED_USER_ID']);
	}//end for loop
?>
<div class="notify notify-green"><span class="symbol icon-tick"></span> Form1 Updated Successfully!</div>
