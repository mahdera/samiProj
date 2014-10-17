<div class="sb-slidebar sb-left sb-style-push">
    <div id="close_slide">
        <ul class="ximg">
            <li class="sb-close"><img src="images/close.png" close="sb-close" class="closeimg" /></li>
        </ul>
    </div>
    <div id="slidecontent">
        
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