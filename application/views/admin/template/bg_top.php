<?php
echo"
  <section id='container' >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class='header black-bg'>
              <div class='sidebar-toggle-box'>
                  <div class='fa fa-bars tooltips' data-placement='right' data-original-title='Toggle Navigation'></div>
              </div>
            <!--logo start-->
            <a href='".base_url()."' class='logo'><b>PT Tri Sinar Purnama</b></a>
            <!--logo end-->
            <div class='top-menu'>
            	<ul class='nav pull-right top-menu'>
                    <li><a class='logout' href='".base_url("admin/index/logout")."'>Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      ";?>