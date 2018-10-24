<?php
echo"
	</section>
      <!-- <footer class='site-footer'>
          <div class='text-center'>
              2014 - Alvarez.is
              <a href='index.html#' class='go-top'>
                  <i class='fa fa-angle-up'></i>
              </a>
          </div>
      </footer> -->
      <!--footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src='".base_url("design/assets/js/jquery.js")."'></script>
    <script src='".base_url("design/assets/js/jquery-1.8.3.min.js")."'></script>
    <script src='".base_url("design/assets/js/bootstrap.min.js")."'></script>
    <script class='include' type='text/javascript' src='".base_url("design/assets/js/jquery.dcjqaccordion.2.7.js")."'></script>
    <script src='".base_url("design/assets/js/jquery.scrollTo.min.js")."'></script>
    <script src='".base_url("design/assets/js/jquery.nicescroll.js")."' type='text/javascript'></script>
    <script src='".base_url("design/assets/js/jquery.sparkline.js")."'></script>
    <script src='".base_url("design/component/js/jquery.ambiance.js")."'></script>

    <!--common script for all pages-->
    <script src='".base_url("design/assets/js/common-scripts.js")."'></script>
    
    <script type='text/javascript' src='".base_url("design/assets/js/gritter/js/jquery.gritter.js")."'></script>
    <script type='text/javascript' src='".base_url("design/assets/js/gritter-conf.js")."'></script>

    <!--script for this page-->
    <script src='".base_url("design/assets/js/sparkline-chart.js")."'></script>    
	<script src='".base_url("design/assets/js/zabuto_calendar.js")."'></script>
    <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
    <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>

  <script>
  $(function() {
    $('.datepicker').datepicker();
  } );
  </script>
    <script>var base_url = '".base_url()."'</script>";



if(!empty($scjav)){
        echo "<script src='".site_url($scjav)."' type='text/javascript'></script>";
        }

echo"
  

  </body>
</html>
";?>