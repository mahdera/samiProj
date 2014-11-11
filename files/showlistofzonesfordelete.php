<?php
    require_once 'zone.php';

    $zoneList = getAllZones();
    if(mysql_num_rows($zoneList)){
        ?>
            <table border="0" width="100%">
                <tr>
                    <td>Ser.No</td>
                    <td>Zone Name</td>
                    <td>Description</td>
                    <td>Delete</td>
                </tr>
                <?php
                  $ctr=1;
                  while($zoneRow = mysql_fetch_object($zoneList)){
                      ?>
                          <tr>
                              <td><?php echo $ctr++;?></td>
                              <td><?php echo $zoneRow->zone_name;?></td>
                              <td><?php echo $zoneRow->description;?></td>
                              <td>
                                  <a href="#" id="<?php echo $zoneRow->id;?>" class="deleteZoneClass">Delete</a>
                              </td>
                          </tr>
                      <?php
                  }//end while loop
                ?>
            </table>
        <?php
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.deleteZoneClass').click(function(){
            var idVal = $(this).attr('id');
            if(window.confirm('Are you sure you want to delete this record?')){
                var dataString = "zoneId="+idVal;
                $.ajax({
                    url: 'files/deletezone.php',
                    data: dataString,
                    type:'POST',
                    success:function(response){
                        $('#zoneManagementDiv').load('files/showlistofzonesfordelete.php');
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        });
    });//end document.ready function
</script>
