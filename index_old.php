<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sami's Project</title>
        <script type='text/javascript' src="js/jquery-1.11.1.js"></script>
        <!-- for the datetime picker -->
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <link href="css/jquery-ui.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/slidebars.css">
        <script type="text/javascript" src="js/modernizr.custom.15150.js" ></script>
        <script type="text/javascript" src="js/accordion.js" ></script>

    </head>
    <body>
        <table border="1" width="100%">
            <tr>
                <td><a href="#.php" id="teamManagementLink">Team</a></td>
                <td><a href="#.php" id="responsibilityManagementLink">Responsibility</a></td>
                <td><a href="#.php" id="assessmentManagementLink">Assessment</a></td>
                <td><a href="#.php" id="thManagementLink">TH</a></td>
                <td><a href="#.php" id="riskManagementLink">Risk</a></td>
                <td><a href="#.php" id="goalFirstManagementLink">Goal First</a></td>
                <td><a href="#.php" id="goalSecondManagementLink">Goal Second</a></td>
                <td><a href="#.php" id="putThActionManagementLink">Put TH Action</a></td>
                <td><a href="#.php" id="putFnActionManagementLink">Put Fn Action</a></td>
                <td><a href="#.php" id="editThActionManagementLink">Edit TH Action</a></td>
                <td><a href="#.php" id="editFnActionManagementLink">Edit Fn Action</a></td>
                <td><a href="#.php" id="form1ManagementLink">Form 1</a></td>
                <td><a href="#.php" id="form2ManagementLink">Form 2</a></td>
                <td><a href="#.php" id="form3ManagementLink">Form 3</a></td>
                <td><a href="#.php" id="form4ManagementLink">Form 4</a></td>
                <td><a href="#.php" id="form5ManagementLink">Form 5</a></td>
                <td><a href="#.php" id="form6ManagementLink">Form 6</a></td>
                <td><a href="#.php" id="form7ManagementLink">Form 7</a></td>
                <td><a href="#.php" id="form8ManagementLink">Form 8</a></td>
                <td><a href="#.php" id="form9ManagementLink">Form 9</a></td>
                <td><a href="#.php" id="form10ManagementLink">Form 10</a></td>
                <td><a href="#.php" id="reportManagementLink">Report</a></td>
            </tr>
        </table>

        <div id="mainDetailDiv">
        </div>

    </body>
</html>
<script type='text/javascript'>
    $(document).ready(function(){

        $('#teamManagementLink').click(function(){
            $('#mainDetailDiv').load('teammanagementform.php', {noncache: new Date().getTime()});
        });

        $('#responsibilityManagementLink').click(function(){
            $('#mainDetailDiv').load('responsibilitymanagementform.php', {noncache: new Date().getTime()});
        });

        $('#assessmentManagementLink').click(function(){
            $('#mainDetailDiv').load('assessmentmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#thManagementLink').click(function(){
            $('#mainDetailDiv').load('thmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#riskManagementLink').click(function(){
            $('#mainDetailDiv').load('riskmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#goalFirstManagementLink').click(function(){
            $('#mainDetailDiv').load('goalfirstmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#goalSecondManagementLink').click(function(){
            $('#mainDetailDiv').load('goalsecondmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#putThActionManagementLink').click(function(){
            $('#mainDetailDiv').load('putthactionmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#putFnActionManagementLink').click(function(){
            $('#mainDetailDiv').load('putfnactionmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#editThActionManagementLink').click(function(){
            $('#mainDetailDiv').load('editthactionmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#editFnActionManagementLink').click(function(){
            $('#mainDetailDiv').load('editfnactionmanagementform.php', {noncache: new Date().getTime()});
        });

        $('#form1ManagementLink').click(function(){
            $('#mainDetailDiv').load('form1managementform.php', {noncache: new Date().getTime()});
        });

        $('#form2ManagementLink').click(function(){
            $('#mainDetailDiv').load('form2managementform.php', {noncache: new Date().getTime()});
        });

        $('#form3ManagementLink').click(function(){
            $('#mainDetailDiv').load('form3managementform.php', {noncache: new Date().getTime()});
        });

        $('#form4ManagementLink').click(function(){
            $('#mainDetailDiv').load('form4managementform.php', {noncache: new Date().getTime()});
        });

        $('#form5ManagementLink').click(function(){
            $('#mainDetailDiv').load('form5managementform.php', {noncache: new Date().getTime()});
        });

        $('#form6ManagementLink').click(function(){
            $('#mainDetailDiv').load('form6managementform.php', {noncache: new Date().getTime()});
        });

        $('#form7ManagementLink').click(function(){
            $('#mainDetailDiv').load('form7managementform.php', {noncache: new Date().getTime()});
        });

        $('#form8ManagementLink').click(function(){
            $('#mainDetailDiv').load('form8managementform.php', {noncache: new Date().getTime()});
        });

        $('#form9ManagementLink').click(function(){
            $('#mainDetailDiv').load('form9managementform.php', {noncache: new Date().getTime()});
        });

        $('#form10ManagementLink').click(function(){
            $('#mainDetailDiv').load('form10managementform.php', {noncache: new Date().getTime()});
        });

        $('#reportManagementLink').click(function(){});


    });//end document.ready function
</script>
