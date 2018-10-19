<?php
echo"

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Sistem Informasi Jadwal dan Data Juara Kontes Burung di Boyolali berbasis Website</title>
<!-- Bootstrap -->
<link href='".base_url("design/enduser/css/bootstrap.min.css")."' rel='stylesheet' type='text/css' />
<link href='".base_url("design/enduser/css/bootstrap.css")."' rel='stylesheet' type='text/css' />
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script type='application/x-javascript'> addEventListener('load', function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
     <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
<![endif]-->
<link href='".base_url("design/enduser/css/style.css")."' rel='stylesheet' type='text/css' media='all' />
<!-- start plugins -->
<script type='text/javascript' src='".base_url("design/enduser/js/jquery.min.js")."'></script>
<script type='text/javascript' src='".base_url("design/enduser/js/bootstrap.js")."'></script>
<script type='text/javascript' src='".base_url("design/enduser/js/bootstrap.min.js")."'></script>
<!-- start slider -->
<link href='".base_url("design/enduser/css/slider.css")."' rel='stylesheet' type='text/css' media='all' />
<script type='text/javascript' src='".base_url("design/enduser/js/modernizr.custom.28468.js")."'></script>
<script type='text/javascript' src='".base_url("design/enduser/js/jquery.cslider.js")."'></script>
	<script type='text/javascript'>
			$(function() {

				$('#da-slider').cslider({
					autoplay : true,
					bgincrement : 450
				});

			});
		</script>
<!-- Owl Carousel Assets -->
<link href='".base_url("design/enduser/css/owl.carousel.css")."' rel='stylesheet'>
<script src='".base_url("design/enduser/js/owl.carousel.js")."'></script>
		<script>
			$(document).ready(function() {

				$('#owl-demo').owlCarousel({
					items : 4,
					lazyLoad : true,
					autoPlay : true,
					navigation : true,
					navigationText : [', '],
					rewindNav : false,
					scrollPerPage : false,
					pagination : false,
					paginationNumbers : false,
				});

			});
		</script>

		<style>
		p {
    		    font-size: 14px;
			    line-height: 1.8em;
			    color: #868686;
			    text-align: justify;

		}
		</style>

<style>
#tabel_gantangan {
    font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#tabel_gantangan td, #tabel_gantangan th {
    border: 1px solid #c1b6b6;
    padding: 8px;
    font-size: 14px;
}

#tabel_gantangan tr:nth-child(even){background-color: #f2f2f2;}

#tabel_gantangan tr:hover {background-color: #ddd;}

#tabel_gantangan th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #9e4c1b;
    color: white;
    font-size: 14px;
    text-align : center;
}
</style>
		<!-- //Owl Carousel Assets -->
<!----font-Awesome----->
   	<link rel='stylesheet' href='".base_url("design/enduser/fonts/css/font-awesome.min.css")."'>
<!----font-Awesome----->
</head>
<body>
<div class='header_bg'>
<div class='container'>
	<div class='row header'>
		<div class='logo navbar-left'>
			<h1><a href='".base_url()."'>Kicauboy.com </a></h1>
		</div>
		<div class='h_search navbar-right'>
			<form>
				<input type='text' class='text' value='Enter text here' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'Enter text here';}'>
				<input type='submit' value='search'>
			</form>
		</div>
		<div class='clearfix'></div>
	</div>
</div>
</div>
<div class='container'>
	<div class='row h_menu'>
		<nav class='navbar navbar-default navbar-left' role='navigation'>
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class='navbar-header'>
		      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
		        <span class='sr-only'>Toggle navigation</span>
		        <span class='icon-bar'></span>
		        <span class='icon-bar'></span>
		        <span class='icon-bar'></span>
		      </button>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
		      <ul class='nav navbar-nav'>
		        <li ";if($this->uri->segment(2) == ""){echo "class='active'";}else{}echo"><a href='".base_url("index")."'>Berita Lomba</a></li>
		        <li ";if($this->uri->segment(2) == "brosur"){echo "class='active'";}else{}echo"><a href='".base_url("index/brosur")."'>Brosur Lomba</a></li>
		        <li ";if($this->uri->segment(2) == "data_juara"){echo "class='active'";}else{}echo"><a href='".base_url("index/data_juara")."'>Data Juara</a></li>
		        <li ";if($this->uri->segment(2) == "contact"){echo "class='active'";}else{}echo"><a href='".base_url("index/contact")."'>Hubungi Kami</a></li>
		        <!-- <li ";if($this->uri->segment(2) == "breeding"){echo "class='active'";}else{}echo"><a href='".base_url("profil")."'></a></li> -->
		        <li><a href='".base_url("index/gantangan")."'>Daftar Gantangan Boyolali</a></li>
		        <li><a href='".base_url("admin/index")."'>Login</a></li>
		        <!-- <li><a href='about.html'>About</a></li>
		        
		        <li><a href='contact.html'>Contact</a></li> -->
		      </ul>
		    </div><!-- /.navbar-collapse -->
		    <!-- start soc_icons -->
		</nav>
		<!-- <div class='soc_icons navbar-right'>
			<ul class='list-unstyled text-center'>
				<li><img src=".base_url("assets/pic/sponsore/find_fb.jpg")." width='50px' height='50px'></img></li>
			</ul>	
		</div> -->
	</div>
</div>
";?>