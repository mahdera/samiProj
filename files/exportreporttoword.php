<?php
	session_start();
	require_once('../msdocgenerator/clsMsDocGenerator.php');
	$doc = new clsMsDocGenerator();	
	$doc->setFontFamily('Times New Roman');
	$doc->setFontSize('14');	

	$doc->startTable(NULL, 'tableGrid');
	$header = array('Instructor Id', 'Full Name');
	$aligns = array('center', 'center');
	$valigns = array('middle', 'middle');
	$doc->addTableRow($header, $aligns, $valigns, array('font-weight' => 'bold', 'font-size' => '12pt','height' => '80pt', 'background-color' => 'lightblue'));

	$id = $_GET['id'];
	require_once 'goalfirst.php';
	require_once 'form1.php';
	require_once 'form1q3.php';
	require_once 'form1q4.php';
	//require_once 'th.php';
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
		$varHolder = array('Title', $form1Obj->title);
		$varHolder = array('Date', $form1Obj->modification_date);		
		$doc->addTableRow($varHolder,$aligns, $valigns, array('font-weight' => 'normal', 'font-size' => '12pt','height' => '80pt', 'background-color' => 'yellow'));		
	}
	$doc->endTable();
	$doc->output();
?>