<?php
@session_start();
if(empty($_SESSION['USER_ID'])){
  header("Location: login.php");
}

if($_SESSION['USER_ROLE_CODE'] === '01A'){
  if(empty($_SESSION['SUB_DISTRICT_ID'])){
    header("Location: nosubdistrictselected.php");
  }
}
?>

<!--to be replaced when the next button is clicked-->
    <div id="topcontain">
        <div id="titlearea">
            <h1 id='currentPageTag'>Step 3-2</h1>
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
    <?php
        require_once 'importjsscripts.php';
    ?>
    <div id="errorDiv"></div>
    <?php
        require_once 'files/showlistofthselectioncheckboxes.php';
    ?>
<script type='text/javascript'>
    $(document).ready(function(){

        $('#rightArrowButton').click(function(){
            var currentPageTag = $('#currentPageTag').html();
            if(currentPageTag === 'Step 3-2'){
                //now I need some how identify which checkboxes are selected and
                //pass the th ids to the coming form
                var selectedCheckBoxesIdDataString = "";
                var ctr = 1;
                $('input:checkbox.checkBoxSelection').each(function () {
                    var checkBoxName = "thCheckBox" + ctr;
                    if( this.checked ){
                        selectedCheckBoxesIdDataString += checkBoxName +"="+ $(this).val()+"&";
                        ctr++;
                    }
                });
                selectedCheckBoxesIdDataString+="ctr="+(ctr-1);
                /*if(ctr === 1){
                    $('#errorDiv').html('<div class="notify notify-red"><span class="symbol icon-error"></span> You need to select at least one value!</div>');
                    var divLoc = $('#errorDiv').offset();
                    $('html, body').animate({scrollTop: divLoc.top}, "slow");
                }else*/{
                    $('#step3Content').load('showstep3_3content.php?'+selectedCheckBoxesIdDataString);
                }
            }
        });

        $('#leftArrowButton').click(function(){
            var currentPageTag = $('#currentPageTag').html();
            if(currentPageTag === 'Step 3-2'){
                window.location.replace("step3.php");
            }
        });

    });//end document.ready function
</script>
