<?php
echo"
<div class='footer'>
   <div class='container'>
     <h3><a href='".base_url()."'>Sistem Informasi dan Pelayanan Pendidikan Surakarta</a></h3>    
     <p> © 2017 Government Surakarta</p>
   </div>
</div>
<!---->
<script>var base_url = '".base_url()."'</script>	    ";
	if(!empty($scjav)){
	    echo "<script src='".site_url($scjav)."' type='text/javascript'></script>";
	}
	echo"
<script type='text/javascript' src='".base_url("assets/jController/CtrlMenu.js")."'></script>
<script type='text/javascript' src='".base_url("design/enduser/js/move-top.js")."'></script>
<script type='text/javascript' src='".base_url("design/enduser/js/easing.js")."'></script>

<script src='".base_url("design/enduser2/js/bootstrap.js")."'> </script>
 <script type='text/javascript'>
    jQuery(document).ready(function($) {
      $('.scroll').click(function(event){   
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
      });
    });
  </script>
<!---->
<script type='text/javascript'>
    $(document).ready(function() {
        /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
        */
    $().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href='#to-top' id='toTop' style='display: block;'> <span id='toTopHover' style='opacity: 1;'> </span></a>
<!----> 
</body>
</html>
";?>