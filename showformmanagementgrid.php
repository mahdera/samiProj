<h1>Form Management</h1>
<form style="padding-right:25px">
    <table border="0" width="100%">
            <tr style="background: #fff">
                <td>Form</td>
                <td>Action</td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm1Link">Form 1</a></td>
                <td align="middle">
                    <a href="#.php">Edit</a> | <a href="#.php" id="hideForm1Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form1Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm2Link">Form 2</a></td>
                <td align="middle">
                    <a href="#.php" id="">Edit</a>
                    |
                    <a href="#.php" id="hideForm2Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form2Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 3</td>
                <td align="middle">
                    <a href="#.php" id="showForm3Link"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="hideForm3Link"><img src="images/close.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form3Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 4</td>
                <td align="middle">
                    <a href="#.php" id="showForm4Link"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="hideForm4Link"><img src="images/close.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form4Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 5</td>
                <td align="middle">
                    <a href="#.php" id="showForm5Link"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="hideForm5Link"><img src="images/close.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form5Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 6</td>
                <td align="middle">
                    <a href="#.php" id="showForm6Link"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="hideForm6Link"><img src="images/close.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form6Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 7</td>
                <td align="middle">
                    <a href="#.php" id="showForm7Link"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="hideForm7Link"><img src="images/close.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form7Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 8</td>
                <td align="middle">
                    <a href="#.php" id="showForm8Link"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="hideForm8Link"><img src="images/close.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form8Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 9</td>
                <td align="middle">
                    <a href="#.php" id="showForm9Link"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="hideForm9Link"><img src="images/close.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form9Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 10</td>
                <td align="middle">
                    <a href="#.php" id="showForm10Link"><img src="images/open.png" border="0" align="absmiddle"/></a> | <a href="#.php" id="hideForm10Link"><img src="images/close.png" border="0" align="absmiddle"/></a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form10Div" style="padding-right:15px;padding-left:15px"></div>
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
