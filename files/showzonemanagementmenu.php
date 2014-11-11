<div>
    <table border="0" width="100%">
        <tr>
              <td><a href="#.php" id="createZoneLinkId">Create Zone</a></td>
              <td><a href="#.php" id="viewZoneLinkId">View Zone</a></td>
              <td><a href="#.php" id="editZoneLinkId">Edit Zone</a></td>
              <td><a href="#.php" id="deleteZoneLinkId">Delete Zone</a></td>
        </tr>
    </table>
</div>
<div id="zoneManagementDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#createZoneLinkId').click(function(){
          $('#zoneManagementDiv').load('files/showcreatezoneform.php');
        });

        $('#viewZoneLinkId').click(function(){
          $('#zoneManagementDiv').load('files/showlistofzones.php');
        });

        $('#editZoneLinkId').click(function(){
          $('#zoneManagementDiv').load('files/showlistofzonesforedit.php');
        });

        $('#deleteZoneLinkId').click(function(){
          $('#zoneManagementDiv').load('files/showlistofzonesfordelete.php');
        });
    });//end document.ready function
</script>
