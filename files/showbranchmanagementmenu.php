<div>
    <table border="0" width="100%">
        <tr>
              <td><a href="#.php" id="createBranchLinkId">Create Branch</a></td>
              <td><a href="#.php" id="viewBranchLinkId">View Branch</a></td>
              <td><a href="#.php" id="editBranchLinkId">Edit Branch</a></td>
              <td><a href="#.php" id="deleteBranchLinkId">Delete Branch</a></td>
        </tr>
    </table>
</div>
<div id="branchManagementDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#branchZoneLinkId').click(function(){
          $('#branchManagementDiv').load('files/showcreatebranchform.php');
        });

        $('#viewBranchLinkId').click(function(){
          $('#branchManagementDiv').load('files/showlistofbranchs.php');
        });

        $('#editBranchLinkId').click(function(){
          $('#branchManagementDiv').load('files/showlistofbranchsforedit.php');
        });

        $('#deleteBranchLinkId').click(function(){
          $('#branchManagementDiv').load('files/showlistofbranchsfordelete.php');
        });
    });//end document.ready function
</script>
