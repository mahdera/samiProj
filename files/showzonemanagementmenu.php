<div>
    <table border="0" width="100%">
        <tr>
              <td><a href="#.php" id="createZoneLinkId">Create District</a></td>
              <td><a href="#.php" id="viewZoneLinkId">View District</a></td>
              <td><a href="#.php" id="editZoneLinkId">Edit Disrict</a></td>
              <td><a href="#.php" id="deleteZoneLinkId">Delete District</a></td>
        </tr>
    </table>
</div>
<div id="zoneManagementDiv"></div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#createZoneLinkId').click(function(){
          $('#zoneManagementDiv').load('files/showcreatezoneform.php',{noncache: new Date().getTime()});
        });

        $('#viewZoneLinkId').click(function(){
          $('#zoneManagementDiv').load('files/showlistofzones.php',{noncache: new Date().getTime()});
        });

        $('#editZoneLinkId').click(function(){
          $('#zoneManagementDiv').load('files/showlistofzonesforedit.php',{noncache: new Date().getTime()});
        });

        $('#deleteZoneLinkId').click(function(){
          $('#zoneManagementDiv').load('files/showlistofzonesfordelete.php',{noncache: new Date().getTime()});
        });
    });//end document.ready function
</script>
