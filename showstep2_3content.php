<div id="topcontain">
    <div id="titlearea">
        <h1 id='currentPageTag'>Step 2-3</h1>
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
<div>
    <?php
        require_once 'thmanagementform.php';
    ?>
</div>
<script type='text/javascript'>
    $(document).ready(function(){

        $('#rightArrowButton').click(function(){
            var currentPageTag = $('#currentPageTag').html();
            if(currentPageTag === 'Step 2-3'){
                $('#step2Content').load('showstep2_4content.php');
            }
        });

        $('#leftArrowButton').click(function(){
            var currentPageTag = $('#currentPageTag').html();
            if(currentPageTag === 'Step 2-3'){
                $('#step2Content').load('showstep2_2content.php');
            }
        });

    });//end document.ready function
</script>
