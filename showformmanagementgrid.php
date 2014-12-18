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
                    <a href="#.php" id="editForm1Link">Edit</a>
                    |
                    <a href="#.php" id="hideForm1Link">Close</a>
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
                    <a href="#.php" id="editForm2Link">Edit</a>
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
                <td><a href="#.php" id="showForm3Link">Form 3</a></td>
                <td align="middle">
                    <a href="#.php" id="editForm3Link">Edit</a>
                    <a href="#.php" id="hideForm3Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form3Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm4Link">Form 4</a></td>
                <td align="middle">
                    <a href="#.php" id="editForm4Link">Edit</a>
                    |
                    <a href="#.php" id="hideForm4Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form4Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm5Link">Form 5</a></td>
                <td align="middle">
                    <a href="#.php" id="editForm5Link">Edit</a>
                    |
                    <a href="#.php" id="hideForm5Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form5Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm6Link">Form 6</a></td>
                <td align="middle">
                    <a href="#.php" id="editForm6Link">Edit</a>
                    |
                    <a href="#.php" id="hideForm6Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form6Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm7Link">Form 7</a></td>
                <td align="middle">
                    <a href="#.php" id="editForm7Link">Edit</a>
                    |
                    <a href="#.php" id="hideForm7Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form7Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm8Link">Form 8</a></td>
                <td align="middle">
                    <a href="#.php" id="editForm8Link">Edit</a>
                    |
                    <a href="#.php" id="hideForm8Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form8Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm9Link">Form 9</a></td>
                <td align="middle">
                    <a href="#.php" id="editForm9Link">Edit</a>
                    |
                    <a href="#.php" id="hideForm9Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form9Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td><a href="#.php" id="showForm10Link">Form 10</a></td>
                <td align="middle">
                    <a href="#.php" id="editForm10Link">Edit</a>
                    |
                    <a href="#.php" id="hideForm10Link">Close</a>
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

        $('#editForm1Link').click(function(){
            $('#form1Div').load('files/showlistofform1records.php');
        });

        $('#showForm2Link').click(function(){
            $('#form2Div').load('form2managementform.php');
        });

        $('#editForm2Link').click(function(){
            $('#form2Div').load('files/showlistofform2records.php');
        });

        $('#showForm3Link').click(function(){
            $('#form3Div').load('form3managementform.php');
        });

        $('#editForm3Link').click(function(){
            $('#form3Div').load('files/showlistofform3records.php');
        });

        $('#showForm4Link').click(function(){
            $('#form4Div').load('form4managementform.php');
        });

        $('#editForm4Link').click(function(){
          $('#form4Div').load('files/showlistofform4records.php');
        });

        $('#showForm5Link').click(function(){
            $('#form5Div').load('form5managementform.php');
        });

        $('#editForm5Link').click(function(){
          $('#form5Div').load('files/showlistofform5records.php');
        });

        $('#showForm6Link').click(function(){
            $('#form6Div').load('form6managementform.php');
        });

        $('#editForm6Link').click(function(){
          $('#form6Div').load('files/showlistofform6records.php');
        });

        $('#showForm7Link').click(function(){
            $('#form7Div').load('form7managementform.php');
        });

        $('#editForm7Link').click(function(){
          $('#form7Div').load('files/showlistofform7records.php');
        });

        $('#showForm8Link').click(function(){
            $('#form8Div').load('form8managementform.php');
        });

        $('#editForm8Link').click(function(){
          $('#form8Div').load('files/showlistofform8records.php');
        });

        $('#showForm9Link').click(function(){
            $('#form9Div').load('form9managementform.php');
        });

        $('#editForm9Link').click(function(){
          $('#form9Div').load('files/showlistofform9records.php');
        });

        $('#showForm10Link').click(function(){
            $('#form10Div').load('form10managementform.php');
        });

        $('#editForm10Link').click(function(){
          $('#form10Div').load('files/showlistofform10records.php');
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
