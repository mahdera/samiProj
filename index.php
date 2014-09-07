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
	<script type="text/javascript" src="js/zebra/javascript/zebra_datepicker.js"></script>
	<link rel="stylesheet" href="js/zebra/css/default.css" type="text/css">
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
            $('#mainDetailDiv').load('teammanagementform.php');
        });
        
        $('#responsibilityManagementLink').click(function(){
            $('#mainDetailDiv').load('responsibilitymanagementform.php');
        });
        
        $('#assessmentManagementLink').click(function(){
            $('#mainDetailDiv').load('assessmentmanagementform.php');
        });
        
        $('#thManagementLink').click(function(){});
        
        $('#riskManagementLink').click(function(){});
        
        $('#goalFirstManagementLink').click(function(){});
        
        $('#goalSecondManagementLink').click(function(){});
        
        $('#putThActionManagementLink').click(function(){});
        
        $('#putFnActionManagementLink').click(function(){});
        
        $('#editThActionManagementLink').click(function(){});
        
        $('#editFnActionManagementLink').click(function(){});
        
        $('#form1ManagementLink').click(function(){});
        
        $('#form2ManagementLink').click(function(){});
        
        $('#form3ManagementLink').click(function(){});
        
        $('#form4ManagementLink').click(function(){});
        
        $('#form5ManagementLink').click(function(){});
        
        $('#form6ManagementLink').click(function(){});
        
        $('#form7ManagementLink').click(function(){});
        
        $('#form8ManagementLink').click(function(){});
        
        $('#form9ManagementLink').click(function(){});
        
        $('#form10ManagementLink').click(function(){});
        
        $('#reportManagementLink').click(function(){});       
        
        
    });//end document.ready function
</script>
