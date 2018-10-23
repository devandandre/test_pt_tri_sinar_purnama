<?php
echo"
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content='>
    <meta name='author' content='Dashboard'>
    <meta name='keyword' content='Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina'>

    <title>Halaman Login Admin</title>

    <!-- Bootstrap core CSS -->
    <link href='".base_url("design/assets/css/bootstrap.css")."' rel='stylesheet'>
    <!--external css-->
    <link href='".base_url("design/assets/font-awesome/css/font-awesome.css")."' rel='stylesheet' />
        
    <!-- Custom styles for this template -->
    <link href='".base_url("design/assets/css/style.css")."' rel='stylesheet'>
    <link href='".base_url("design/assets/css/style-responsive.css")."' rel='stylesheet'>
    <link rel='stylesheet' href='".base_url("design/component/js/jquery.ambiance.css")."'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
      <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id='login-page'>
	  	<div class='container'>
	  	
		      <form class='form-login'>
		        <h2 class='form-login-heading'>Sign In</h2>
		        <div class='login-wrap'>
		            <input type='text' id='username' name='username' class='form-control' placeholder='Username' autofocus>
		            <br>
		            <input type='password' id='password' name='password' class='form-control' placeholder='Password'>
		            <label class='checkbox'>

		            </label>
		            	<button class='btn btn-theme btn-block' type='button' onclick=javascript:login()><i class='fa fa-lock'></i> SIGN IN</button>
		            <hr>
		            
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden='true' aria-labelledby='myModalLabel' role='dialog' tabindex='-1' id='myModal' class='modal fade'>
		              <div class='modal-dialog'>
		                  <div class='modal-content'>
		                      <div class='modal-header'>
		                          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
		                          <h4 class='modal-title'>Forgot Password ?</h4>
		                      </div>
		                      <div class='modal-body'>
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type='text' name='email' placeholder='Email' autocomplete='off' class='form-control placeholder-no-fix'>
		
		                      </div>
		                      <div class='modal-footer'>
		                          <button data-dismiss='modal' class='btn btn-default' type='button'>Cancel</button>
		                          <button class='btn btn-theme' type='button'>Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script>var base_url = '".base_url()."admin/'</script>
    <script src='".base_url("design/assets/js/jquery.js")."'></script>
    <script src='".base_url("design/assets/js/bootstrap.min.js")."'></script>
    <script src='".base_url("design/component/js/jquery.ambiance.js")."'></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type='text/javascript' src='".base_url("design/assets/js/jquery.backstretch.min.js")."'></script>
    <script>
        $.backstretch('".base_url("design/assets/img/sistem_monitoring.jpg")."', {speed: 500});
    </script>
	<script src='".base_url("assets/jController/admin/CtrlIndex.js")."'></script>

  </body>
</html>

";?>