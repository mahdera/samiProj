<?php
  @session_start();
  if(empty($_SESSION['USER_ID'])){
      header("Location: login.php");
  }
  require_once 'files/user.php';
  require_once 'files/formhelper.php';
  $theUserId = $_SESSION['INDIVIDUAL_INT_USER_ID'];
  $loggedInUserObj = getUser($theUserId);
  $loggedInUserRole = $loggedInUserObj->user_role;
?>
    <h1>Form Management</h1>
    <?php
    if($loggedInUserObj->member_type == 'User' /*&& $loggedInUserObj->user_role == '01A'*/){
        if(isset($_SESSION['SUB_DISTRICT_ID'])){
            //do nothing the sub district id is already initialized.
        }else{
            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
            $_SESSION['SUB_DISTRICT_ID'] = $userSubDistrictObj->sub_district_id;
        }
    ?>
    <!-- Bootstrap CSS Toolkit styles -->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">-->
    <?php require_once 'importjsscripts.php';?>

    <div>
        <!-- Button to select & upload files -->
        <span class="btn btn-success fileinput-button">
            <span><a href="#.php">Select files...</a></span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="fileupload" type="file" name="files[]" multiple>
        </span>
        <!-- The list of files uploaded -->
        <p>Files uploaded:</p>
        <ul id="files"></ul>


        <!-- JavaScript used to call the fileupload widget to upload files -->
        <script type="text/javascript">
        // When the server is ready...
        $(function () {
        'use strict';

        // Define the url to send the image data to
        var url = 'files/files.php';

        // Call the fileupload widget and set some parameters
        //$('#uploadLinkId').click(function(){
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                done: function (e, data) {
                    // Add each uploaded file name to the #files list
                    $.each(data.result.files, function (index, file) {
                        $('<li/>').text(file.name).appendTo('#files');
                    });
                },
                progressall: function (e, data) {
                    // Update the progress bar while files are being uploaded
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .bar').css(
                        'width',
                        progress + '%'
                    );
                }
            });
        });//end link click function
        </script>
    </div>

<?php
 }
?>

<form style="padding-right:25px;">
    <table border="1" width="100%" rules="all">
            <tr style="background: #eee">
                <td>Form</td>
                <td>
                    <?php
                        require_once 'files/user.php';
                        require_once 'files/usersubdistrict.php';
                        require_once 'files/uploadeddocument.php';

                        $userObj = getUser($_SESSION['LOGGED_USER_ID']);
                        $goalFirstList = null;
                        $uploadedDocResult = null;

                        if($userObj->user_level == '02'){
                            $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                            //$goalFirstList = getAllGoalFirstsModifiedByUsingUserLevel('02', $userSubDistrictObj->sub_district_id);
                            $uploadedDocResult = getAllUploadedDocumentsForSubDistrict($userSubDistrictObj->sub_district_id);
                        }else if($userObj->user_level == '01'){
                            $userObj = getUserFromThisSubDistrictWithStatus($_SESSION['SUB_DISTRICT_ID'], 'Active');
                            if(!empty($userObj)){
                                $userSubDistrictObj = getSubDistrictInfoForUser($userObj->id);
                                $uploadedDocResult = getAllUploadedDocumentsForSubDistrict($_SESSION['SUB_DISTRICT_ID']);
                            }
                        }

                        //$uploadedDocResult = getAllUploadedDocuments();
                        if( !empty($uploadedDocResult) ){
                            ?>
                            <h2>Downloads</h2>
                            <table border="0" width="100%">
                                <tr style="background: #ccc">
                                    <td>Thumbnail</td>
                                    <td>File Name</td>
                                    <td>Upload Date</td>
                                    <td>Download</td>
                                </tr>
                                <?php
                                while($uploadedDocRow = mysql_fetch_object($uploadedDocResult)){
                                    $pathVar = "files/uploaded_files/thumbnail/" . $uploadedDocRow->file_name;
                                    $imgPathVar = "files/uploaded_files/" . $uploadedDocRow->file_name;
                                    ?>
                                    <tr>
                                        <td><img src="<?php echo $pathVar;?>" border="0" align="absmiddle"/></td>
                                        <td><?php echo $uploadedDocRow->file_name;?></td>
                                        <td><?php echo $uploadedDocRow->upload_date;?></td>
                                        <td><a href="<?php echo $imgPathVar;?>">Download</a></td>
                                    </tr>
                                    <?php
                                }//end while loop
                                ?>
                            </table>
                            <?php
                        }
                    ?>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 1</td>
                <td align="middle">
                    <?php
                    $countVal = doesThisFormAlreadyHasRecordAttachedToIt(1);
                    if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm1Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm1Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
                    <a href="#.php" id="hideForm1Link">Close</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="form1Div" style="padding-right:15px;padding-left:15px"></div>
                </td>
            </tr>
            <tr style="background:#fff">
                <td>Form 2</td>
                <td align="middle">
                    <?php
                    $countVal = doesThisFormAlreadyHasRecordAttachedToIt(2);
                    if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm2Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm2Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
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
                    <?php
                    $countVal = doesThisFormAlreadyHasRecordAttachedToIt(3);
                    if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm3Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm3Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
                    <a href="#.php" id="hideForm3Link">Close</a>
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
                    <?php
                    $countVal = doesThisFormAlreadyHasRecordAttachedToIt(4);
                    if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm4Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm4Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
                    <a href="#.php" id="hideForm4Link">Close</a>
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
                    <?php
                    $countVal = doesThisFormAlreadyHasRecordAttachedToIt(5);
                    if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm5Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm5Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
                    <a href="#.php" id="hideForm5Link">Close</a>
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
                    <?php
                    $countVal = doesThisFormAlreadyHasRecordAttachedToIt(6);
                    if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm6Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm6Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
                    <a href="#.php" id="hideForm6Link">Close</a>
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
                    <?php
                    $countVal = doesThisFormAlreadyHasRecordAttachedToIt(7);
                    if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm7Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm7Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
                    <a href="#.php" id="hideForm7Link">Close</a>
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
                    <?php
                    $countVal = doesThisFormAlreadyHasRecordAttachedToIt(8);
                    if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm8Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm8Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
                    <a href="#.php" id="hideForm8Link">Close</a>
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
                    <?php
                        $countVal = doesThisFormAlreadyHasRecordAttachedToIt(9);
                        if($countVal == 0){
                    ?>
                    <a href="#.php" id="showForm9Link">Add</a>
                    |
                    <?php
                    }else{
                    ?>
                    <a href="#.php" id="editForm9Link">Edit</a>
                    |
                    <?php
                    }
                    ?>
                    <a href="#.php" id="hideForm9Link">Close</a>
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
                    <?php
                        $countVal = doesThisFormAlreadyHasRecordAttachedToIt(10);
                        if($countVal == 0){
                    ?>
                        <a href="#.php" id="showForm10Link">Add</a>
                        |
                    <?php
                        }else{
                    ?>
                        <a href="#.php" id="editForm10Link">Edit</a>
                        |
                    <?php
                        }
                    ?>
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
            $('#form1Div').load('form1managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm1Link').click(function(){
            //$('#form1Div').load('files/showlistofform1records.php');
            $('#form1Div').load('files/showform1editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm2Link').click(function(){
            $('#form2Div').load('form2managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm2Link').click(function(){
            //$('#form2Div').load('files/showlistofform2records.php');
            $('#form2Div').load('files/showform2editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm3Link').click(function(){
            $('#form3Div').load('form3managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm3Link').click(function(){
            //$('#form3Div').load('files/showlistofform3records.php');
            $('#form3Div').load('files/showform3editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm4Link').click(function(){
            $('#form4Div').load('form4managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm4Link').click(function(){
          //$('#form4Div').load('files/showlistofform4records.php');
          $('#form4Div').load('files/showform4editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm5Link').click(function(){
            $('#form5Div').load('form5managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm5Link').click(function(){
          //$('#form5Div').load('files/showlistofform5records.php');
          $('#form5Div').load('files/showform5editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm6Link').click(function(){
            $('#form6Div').load('form6managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm6Link').click(function(){
          //$('#form6Div').load('files/showlistofform6records.php');
          $('#form6Div').load('files/showform6editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm7Link').click(function(){
            $('#form7Div').load('form7managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm7Link').click(function(){
          //$('#form7Div').load('files/showlistofform7records.php');
          $('#form7Div').load('files/showform7editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm8Link').click(function(){
            $('#form8Div').load('form8managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm8Link').click(function(){
          //$('#form8Div').load('files/showlistofform8records.php');
          $('#form8Div').load('files/showform8editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm9Link').click(function(){
            $('#form9Div').load('form9managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm9Link').click(function(){
          //$('#form9Div').load('files/showlistofform9records.php');
          $('#form9Div').load('files/showform9editfields_modified.php', {noncache: new Date().getTime()});
        });

        $('#showForm10Link').click(function(){
            $('#form10Div').load('form10managementform.php', {noncache: new Date().getTime()});
        });

        $('#editForm10Link').click(function(){
          //$('#form10Div').load('files/showlistofform10records.php');
          $('#form10Div').load('files/showform10editfields_modified.php', {noncache: new Date().getTime()});
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
