<?php
session_start();
if(!!empty($_SESSION['USER_ID'])){
  header("Location: login.php");
}

if($_SESSION['USER_ROLE_CODE'] === '01A'){
  if(!!empty($_SESSION['SUB_DISTRICT_ID'])){
    header("Location: nosubdistrictselected.php");
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>title</title>
  <script type='text/javascript' src="js/jquery-1.11.1.js"></script>
  <!-- for the datetime picker -->
  <script type="text/javascript" src="js/jquery-ui.js"></script>
  <link href="css/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/slidebars.css">
  <link rel="stylesheet" media="all" type="text/css" href="css/jquery-impromptu.css" />
  <script type="text/javascript" src="js/modernizr.custom.15150.js" ></script>
  <script type="text/javascript" src="js/accordion.js" ></script>
</head>
<body id="step5">
  <div id="sb-site">
    <div id="dtool" class="5dcontain">
      <?php
      require 'menurow.php';
      require 'steprowstep1.php';
      //require 'contentstep1.php';
      //require 'showstep1_2content.php';
      ?>
      <div class="content" id='step1Content'>
        <!--to be replaced when the next button is clicked-->
        <div id="topcontain">
          <div id="titlearea">
            <h1 id='currentPageTag'>Step 1-1</h1>
            <h2></h2>
            <h3></h3>
          </div>
          <div id="resourcearea">
            <ul>
              <li class="sb-toggle-right"><img src="images/resource_icon.png" alt="Resource Toolkit" /> Resource Toolkit</li>
            </ul>
          </div>
        </div>
        <div class="col-half left">
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
          <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
        </div><!-- /col-half --><!-- /col-half -->
        <!--end to be replaced content-->
      </div> <!-- /content -->
    </div>
    <?php
    require 'footer.php';
    ?>
  </div>
  <?php
  require 'sidebar.php';
  require 'importjsscripts.php';
  ?>
</body>
</html>
