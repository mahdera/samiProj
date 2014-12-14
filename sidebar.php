<div class="sb-slidebar sb-left sb-style-push">
    <div id="close_slide">
        <ul class="ximg">
            <li class="sb-close"><img src="images/close.png" close="sb-close" class="closeimg" /></li>
        </ul>
    </div>
    <div id="slidecontent">
        <h3 class="clicker" id="stepOneMenuLink">Step 1</h3>
        <ul class="reveal">
            <li><a href="step1.php" id="step1_1MenuLink">Step 1-1</a></li>
            <li><a href="step1_2fullstatic.php" id="step1_2MenuLink">Step 1-2</a></li>
            <li><a href="step1_3fullstatic.php" id="step1_3MenuLink">Step 1-3</a></li>
            <li><a href="step1_4fullstatic.php" id="step1_4MenuLink">Step 1-4</a></li>
        </ul>
        <h3 class="clicker" id="stepTwoMenuLink">Step 2</h3>
        <ul class="reveal">
            <li><a href="step2.php" id="step2_1MenuLink">Step 2-1</a></li>
            <li><a href="step2_2fullstatic.php" id="step2_2MenuLink">Step 2-2</a></li>
            <li><a href="step2_3fullstatic.php" id="step2_3MenuLink">Step 2-3</a></li>
            <li><a href="step2_4fullstatic.php" id="step2_4MenuLink">Step 2-4</a></li>
        </ul>
        <h3 class="clicker" id="stepThreeMenuLink">Step 3</h3>
        <ul class="reveal">
            <li><a href="step3.php" id="step3_1MenuLink">Step 3-1</a></li>
            <li><a href="step3_2fullstatic.php" id="setp3_2MenuLink">Step 3-2</a></li>
            <li><a href="step3_3fullstatic.php" id="step3_3MenuLink">Step 3-3</a></li>
            <li><a href="step3_4fullstatic.php" id="step3_4MenuLink">Step 3-4</a></li>
        </ul>
        <h3 class="clicker" id="stepFourMenuLink">Step 4</h3>
        <ul class="reveal">
            <li><a href="step4.php" id="step4_1MenuLink">Step 4-1</a></li>
            <li><a href="step4_2fullstatic.php" id="setp4_2MenuLink">Step 4-2</a></li>
            <li><a href="step4_3fullstatic.php" id="step4_3MenuLink">Step 4-3</a></li>
            <li><a href="step4_4fullstatic.php" id="step4_4MenuLink">Step 4-4</a></li>
        </ul>
        <h3 class="clicker" id="stepFiveMenuLink">Step 5</h3>
        <ul class="reveal">
            <li><a href="step5.php" id="step5_1MenuLink">Step 5-1</a></li>
            <li><a href="step5_2fullstatic.php" id="step5_2MenuLink">Step 5-2</a></li>
            <li><a href="step5_3fullstatic.php" id="step5_3MenuLink">Step 5-3</a></li>
            <li><a href="step5_4fullstatic.php" id="step5_4MenuLink">Step 5-4</a></li>
        </ul>
        <h3 class="clicker" id="stepSixMenuLink">Step 6</h3>
        <ul class="reveal">
            <li><a href="step6.php" id="step6_1MenuLink">Step 6-1</a></li>
            <li><a href="step6_2fullstatic.php" id="step6_2MenuLink">Step 6-2</a></li>
            <li><a href="step6_3fullstatic.php" id="step6_3MenuLink">Step 6-3</a></li>
            <li><a href="step6_4fullstatic.php" id="step6_4MenuLink">Step 6-4</a></li>
            <li><a href="step6_5fullstatic.php" id="step6_5MenuLink">Step 6-5</a></li>
        </ul>
    </div>
    <div class="savequit">
        <ul class="sq">
        </ul>
    </div>
</div>



<div class="sb-slidebar sb-right sb-style-push">
    <div id="close_slide2">
        <ul class="ximgl">
            <li class="sb-close"><img src="images/close.png" close="sb-close" class="closeimg" /></li>
        </ul>
    </div>

    <div class="rthead">
        <h3 class="rtheading">Resource Toolkit</h3>
    </div>
    <div id="slidecontent2">
        <h3 class="clicker resources guidanceimg">Guidance</h3>
        <ul class="reveal">
            <li><a href="#">Guidance Link 1</a></li>
            <li><a href="#">Guidance Link 2</a></li>
            <li><a href="#">Guidance Link 3</a></li>
            <li><a href="#">Guidance Link 4</a></li>
        </ul>
        <h3 class="clicker resources resourceimg">Resources</h3>
        <ul class="reveal">
            <li><a href="#">Resources Link 1</a></li>
            <li><a href="#">Resources Link 2</a></li>
            <li><a href="#">Resources Link 3</a></li>
            <li><a href="#">Resources Link 4</a></li>
        </ul>
        <h3 class="clicker resources exampleimg">Examples</h3>
        <ul class="reveal">
            <li><a href="#">Examples Link 1</a></li>
            <li><a href="#">Examples Link 2</a></li>
            <li><a href="#">Examples Link 3</a></li>
            <li><a href="#">Examples Link 4</a></li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        jQuery.slidebars();

        $('#stepOneMenuLink').click(function(){
            //window.location.replace('step1.php');
        });

        $('#step1_1MenuLink').click(function(){
            window.location.replace('step1.php');
        });

        $('#step1_2MenuLink').click(function(){
          window.location.replace('showstep1_2static.php');
        });

        $('#step1_3MenuLink').click(function(){
          window.location.replace('showstep1_3static.php');
        });

        $('#step1_4MenuLink').click(function(){
          window.location.replace('showstep1_4static.php');
        });

        $('#stepTwoMenuLink').click(function(){
            //window.location.replace('step2.php');
        });

        $('#step2_1MenuLink').click(function(){
          window.location.replace('step2.php');
        });

        $('#step2_2MenuLink').click(function(){
          window.location.replace('showstep2_2static.php');
        });

        $('#step2_3MenuLink').click(function(){
          window.location.replace('showstep2_3static.php');
        });

        $('#step2_4MenuLink').click(function(){
          window.location.replace('showstep2_4static.php');
        });

        $('#stepThreeMenuLink').click(function(){
            //window.location.replace('step3.php');
        });

        $('#step3_1MenuLink').click(function(){
          window.location.replace('step3.php');
        });

        $('#step3_2MenuLink').click(function(){
          window.location.replace('showstep3_2static.php');
        });

        $('#step3_3MenuLink').click(function(){
          window.location.replace('showstep3_3static.php');
        });

        $('#step3_4MenuLink').click(function(){
          window.location.replace('showstep3_4static.php');
        });

        $('#stepFourMenuLink').click(function(){
            //window.location.replace('step4.php');
        });

        $('#step4_1MenuLink').click(function(){
          window.location.replace('step4.php');
        });

        $('#step4_2MenuLink').click(function(){
          window.location.replace('showstep4_2static.php');
        });

        $('#step4_3MenuLink').click(function(){
          window.location.replace('showstep4_3static.php');
        });

        $('#step4_4MenuLink').click(function(){
          window.location.replace('showstep4_4static.php');
        });

        $('#stepFiveMenuLink').click(function(){
            //window.location.replace('step5.php');
        });

        $('#step5_1MenuLink').click(function(){
          window.location.replace('step5.php');
        });

        $('#step5_2MenuLink').click(function(){
          window.location.replace('showstep5_2static.php');
        });

        $('#step5_3MenuLink').click(function(){
          window.location.replace('showstep5_3static.php');
        });

        $('#step5_4MenuLink').click(function(){
          window.location.replace('showstep5_4static.php');
        });

        $('#stepSixMenuLink').click(function(){
            //window.location.replace('step6.php');
        });

        $('#step6_1MenuLink').click(function(){
          window.location.replace('step6.php');
        });

        $('#step6_2MenuLink').click(function(){
          window.location.replace('showstep6_2static.php');
        });

        $('#step6_3MenuLink').click(function(){
          window.location.replace('showstep6_3static.php');
        });

        $('#step6_4MenuLink').click(function(){
          window.location.replace('showstep6_4static.php');
        });

        $('#step6_5MenuLink').click(function(){
          window.location.replace('showstep6_5static.php');
        });
    });//end document.ready function
</script>
