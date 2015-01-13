<div>
    <table border="1" width="100%" rules="all">
        <tr style="background:#ccc;font-weight:bolder">
              <td><a href="#.php" id="createBranchLinkId">Create Sub District</a></td>
              <td style="display:none"><a href="#.php" id="viewBranchLinkId">View Sub District</a></td>
              <td style="display:none"><a href="#.php" id="editBranchLinkId">Edit Sub District</a></td>
              <td style="display:none"><a href="#.php" id="deleteBranchLinkId">Delete Sub District</a></td>
        </tr>
    </table>
</div>
<!--<div id="branchManagementDiv"></div>-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#createBranchLinkId').click(function(){
          $('#branchManagementDiv').load('files/showcreatebranchform.php',{noncache: new Date().getTime()});
          $('#duplicationErrorDiv').html('');
        });

        $('#viewBranchLinkId').click(function(){
          $('#branchManagementDiv').load('files/showlistofbranchs.php',{noncache: new Date().getTime()});
        });

        $('#editBranchLinkId').click(function(){
          $('#branchManagementDiv').load('files/showlistofbranchsforedit.php',{noncache: new Date().getTime()});
        });

        $('#deleteBranchLinkId').click(function(){
          $('#branchManagementDiv').load('files/showlistofbranchsfordelete.php',{noncache: new Date().getTime()});
        });
    });//end document.ready function
</script>
