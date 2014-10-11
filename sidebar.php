<div class="sb-slidebar sb-left sb-style-push">
    <div id="close_slide">
        <ul class="ximg">
            <li class="sb-close"><img src="images/close.png" close="sb-close" class="closeimg" /></li>
        </ul>
    </div>
    <div id="slidecontent">
        <h3 class="clicker" id="stepOneMenuLink">Step 1</h3>
        <ul class="reveal">
            <li><a href="#.php" id="">1-1</a></li>
            <li><a href="#.php">1-2</a></li>
            <li><a href="#.php">1-3</a></li>
            <li><a href="#.php">1-4</a></li>
        </ul>        
        <h3 class="clicker" id="stepTwoMenuLink">Step 2</h3>
        <ul class="reveal">
            <li><a href="#.php">2-1</a></li>
            <li><a href="#.php">2-2</a></li>
            <li><a href="#.php">2-3</a></li>
            <li><a href="#.php">2-4</a></li>
        </ul>
        <h3 class="clicker" id="stepThreeMenuLink">Step 3</h3>
        <ul class="reveal">
            <li><a href="#.php">3-1</a></li>
            <li><a href="#.php">3-2</a></li>
            <li><a href="#.php">3-3</a></li>
            <li><a href="#.php">3-4</a></li>
        </ul>
        <h3 class="clicker" id="stepFourMenuLink">Step 4</h3>
        <ul class="reveal">
            <li><a href="#.php">4-1</a></li>
            <li><a href="#.php">4-2</a></li>
            <li><a href="#.php">4-3</a></li>
            <li><a href="#.php">4-4</a></li>
        </ul>
        <h3 class="clicker" id="stepFiveMenuLink">Step 5</h3>
        <ul class="reveal">
            <li><a href="#.php">5-1</a></li>
            <li><a href="#.php">5-2</a></li>
            <li><a href="#.php">5-3</a></li>
            <li><a href="#.php">5-4</a></li>
        </ul>
        <h3 class="clicker" id="stepSixMenuLink">Step 6</h3>
        <ul class="reveal">
            <li><a href="#.php">6-1</a></li>
            <li><a href="#.php">6-2</a></li>
            <li><a href="#.php">6-3</a></li>
            <li><a href="#.php">6-4</a></li>
            <li><a href="#.php">6-5</a></li>
            <li><a href="#.php">6-6</a></li>
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
        $('#stepOneMenuLink').click(function(){
            window.location.replace('step1.php');
        });

        $('#stepTwoMenuLink').click(function(){
            window.location.replace('step2.php');
        });

        $('#stepThreeMenuLink').click(function(){
            window.location.replace('step3.php');
        });

        $('#stepFourMenuLink').click(function(){
            window.location.replace('step4.php');
        });

        $('#stepFiveMenuLink').click(function(){
            window.location.replace('step5.php');
        });

        $('#stepSixMenuLink').click(function(){
            window.location.replace('step6.php');
        });
    });//end document.ready function
</script>