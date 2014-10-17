<h1>Form Management</h1>
<form>
    <table border="0" width="100%">
            <tr style="background: #ccc">
                <td>Form</td>
                <td>Action</td>
            </tr>
            <tr style="background:#eee">
                <td>Form 1</td>
                <td>
                    <a href="#.php" id="showForm1Link">Show</a> | <a href="#.php" id="hideForm1Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form1Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 2</td>
                <td>
                    <a href="#.php" id="showForm2Link">Show</a> | <a href="#.php" id="hideForm2Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form2Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 3</td>
                <td>
                    <a href="#.php" id="showForm3Link">Show</a> | <a href="#.php" id="hideForm3Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form3Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 4</td>
                <td>
                    <a href="#.php" id="showForm4Link">Show</a> | <a href="#.php" id="hideForm4Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form4Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 5</td>
                <td>
                    <a href="#.php" id="showForm5Link">Show</a> | <a href="#.php" id="hideForm5Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form5Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 6</td>
                <td>
                    <a href="#.php" id="showForm6Link">Show</a> | <a href="#.php" id="hideForm6Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form6Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 7</td>
                <td>
                    <a href="#.php" id="showForm7Link">Show</a> | <a href="#.php" id="hideForm7Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form7Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 8</td>
                <td>
                    <a href="#.php" id="showForm8Link">Show</a> | <a href="#.php" id="hideForm8Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form8Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 9</td>
                <td>
                    <a href="#.php" id="showForm9Link">Show</a> | <a href="#.php" id="hideForm9Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form9Div"></div>
                </td>
            </tr>
            <tr style="background:#eee">
                <td>Form 10</td>
                <td>
                    <a href="#.php" id="showForm10Link">Show</a> | <a href="#.php" id="hideForm10Link">Hide</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form10Div"></div>
                </td>
            </tr>
        </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('#showForm1Link').click(function(){
            $('#form1Div').load('form1managementform.php');
        });
        
        $('#showForm2Link').click(function(){
            $('#form2Div').load('form2managementform.php');
        });
        
        $('#showForm3Link').click(function(){
            $('#form3Div').load('form3managementform.php');
        });
        
        $('#showForm4Link').click(function(){
            $('#form4Div').load('form4managementform.php');
        });
        
        $('#showForm5Link').click(function(){
            $('#form5Div').load('form5managementform.php');
        });
        
        $('#showForm6Link').click(function(){
            $('#form6Div').load('form6managementform.php');
        });
        
        $('#showForm7Link').click(function(){
            $('#form7Div').load('form7managementform.php');
        });
        
        $('#showForm8Link').click(function(){
            $('#form8Div').load('form8managementform.php');
        });
        
        $('#showForm9Link').click(function(){
            $('#form9Div').load('form9managementform.php');
        });
        
        $('#showForm10Link').click(function(){
            $('#form10Div').load('form10managementform.php');
        });
        
        $('#hideForm1Link').click(function(){
            $('#form1Div').html('');
        });
        
        $('#hideForm2Link').click(function(){
            $('#form2Div').html('');
        });
        
        $('#hideForm3Link').click(function(){
            $('#form3Div').html('');
        });
        
        $('#hideForm4Link').click(function(){
            $('#form4Div').html('');
        });
        
        $('#hideForm5Link').click(function(){
            $('#form5Div').html('');
        });
        
        $('#hideForm6Link').click(function(){
            $('#form6Div').html('');
        });
        
        $('#hideForm7Link').click(function(){
            $('#form7Div').html('');
        });
        
        $('#hideForm8Link').click(function(){
            $('#form8Div').html('');
        });
        
        $('#hideForm9Link').click(function(){
            $('#form9Div').html('');
        });
        
        $('#hideForm10Link').click(function(){
            $('#form10Div').html('');
        });
        
    });//end document.ready function
</script>