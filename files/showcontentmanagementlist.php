<?php
  require_once 'th.php';
  require_once 'fn.php';
  require_once 'risk.php';
  require_once 'team.php';
  require_once 'responsibility.php';
  require_once 'goalfirst.php';
  require_once 'goalsecond.php';
?>
<table border="0" width="100%">
  <tr>
    <td>Select Data Source</td>
    <td>
      <select name="slctdatasource" id="slctdatasource" style="width:100%">
        <option value="" selected="selected">--Select--</option>
        <option value="Fn">Fn</option>
        <option value="Goal First">Goal First</option>
        <option value="Goal Second">Goal Second</option>
        <option value="Responsibility">Responsibility</option>
        <option value="Risk">Risk</option>
        <option value="Team">Team</option>
        <option value="Th">Th</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="right">
      <input type="button" value="Show Data" id="btnshowdatasource"/>
    </td>
  </tr>
</table>
<div id="dataSourceDetailDiv"></div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#btnshowdatasource').click(function(){
      var dataSource = $('#slctdatasource').val();
      $('#dataSourceDetailDiv').load('files/showdatasourcedetailforthisdatasource.php?dataSource='+dataSource);
    });
  });//end document.ready function
</script>
