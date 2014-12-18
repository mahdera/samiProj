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
                <li class="sb-toggle-right" id="step1_1"><img src="images/resource_icon.png" alt="Resource Toolkit" /> Resource Toolkit</li>
            </ul>
        </div>
    </div>
    <div class="col-half left">
        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
        <!--THIS IS ADDED TO SHOW HOW THE POPUP WORKS WITH JQUERY-->
        <p>
          <div class="messagepop pop">
            <a class="close">x</a>
            Sami, here goes the content you want to appear as a popup! Put it inside the div element<!--this is the text that you want to show in the popup-->
          </div>
          <a href="#." id="popup1">Click me to see the popup in Action!</a><!--make sure to create other id...if you have another popup its id should be popup2...etc-->
        </p>
        <!--END SAMPLE CODE FOR POPUP IN JQUERY-->
    </div><!-- /col-half --><!-- /col-half -->
    <!--end to be replaced content-->
</div> <!-- /content -->
<script type='text/javascript'>
    $(document).ready(function(){
        //SAMI: This is added for the popup message..../////////////////////
        $('#popup1').click(function(){
          if($(this).hasClass('selected')) {
            deletePopup($(this));
          } else {
            $(this).addClass('selected');
            $('.pop').slideFadeToggle();
          }
          return false;
        });

        $('.close').click(function(){
          deletePopup($('#popup1'));
        });

        function deletePopup(e){
          $('.pop').slideFadeToggle(function() {
            e.removeClass('selected');
          });
        }

        $.fn.slideFadeToggle = function(easing, callback) {
          return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
        };
        /////////////////UPTO HERE IS THE CODE FOR THE POPUP MESSAGE SHOWING BY CLICKING....///////

        $('#rightArrowButton').click(function(){
            /*var currentPageTag = $('#currentPageTag').html();
            if(currentPageTag === 'Step 1-1'){
                $('#step1Content').load('showstep1_2content.php');
            }*/
            window.location.replace('step1_2fullstatic.php');
        });

        $('#leftArrowButton').click(function(){
            var currentPageTag = $('#currentPageTag').html();
            if(currentPageTag === 'Intro Two'){
                window.location.replace("intro1.php");
            }else if(currentPageTag === 'Intro Three'){
                window.location.replace("intro2.php");
            }
        });

    });//end document.ready function
</script>
