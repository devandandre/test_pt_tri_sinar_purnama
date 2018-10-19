<?php
echo"
<div class='header'>
   <div class='container'>
     <!-- <div class='social'>             
        <a href='#'><i class='facebook'></i></a>
        <a href='#'><i class='twitter'></i></a>
        <a href='#'><i class='dribble'></i></a> 
        <a href='#'><i class='google'></i></a>  
        <a href='#'><i class='youtube'></i></a> 
     </div> -->
     <div class='details'>
      <ul>
        <li><a href='mailto:@example.com'><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span>xx@gmail.com</a></li>
        <li><span class='glyphicon glyphicon-earphone' aria-hidden='true'></span>(+62) 271 123 456789</li>
       </ul>
     </div>
     <div class='clearfix'></div>
   </div>
</div>
<div id='home'>
   <div id='to-top' class='container'>
     <div class='top-header'>
       <!-- <div class='logo'>
          <h1><a href='index.html'>Dinas Pendidikan Kota Surakarta</a></h1>
       </div> -->
       <div class='top-nav'>
         <nav class='cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right' id='cbp-spmenu-s2'>
           <h3>Menu</h3>
            <div id='menu_utama'>
              <a  href='".base_url()."'>Menu Utama</a>
              <a class='scroll' href='#!' onclick=javascript:klik_profil()>Profil</a>
             <!-- <a class='scroll' href='#gallery'>Visi Dan Misi Pemerintah Surakarta</a>
              <a class='scroll' href='#blog'>Visi Dan Misi Dinas Pendidikan Surakarta</a> -->";
              $data_menu_list = $this->db->where('active',1)->get('tb_materi');

              foreach($data_menu_list->result() as $dml){
                echo"
                <a class='scroll' href='#".$dml->id."' onclick=javascript:klik_menu_d(".$dml->id.")>".$dml->judul."</a>
                ";
              }

              echo"
            </div>
            <div id='sub_menu'>

            </div>

            <div id='sub_sub_menu'>

            </div>

            <div id='sub_sub_sub_menu'>

            </div>

            <div id='sub_sub_sub_sub_menu'>

            </div>

            <div id='profil' style='display:none'>
              <a  href='".base_url("index/struktur")."'>Struktur Organisasi</a>
              <a  href='".base_url("peta")."'>Peta</a>
              <a  href='#!' onclick=javascript:kembali_s('profil')>Kembali</a>
            </div>
         </nav>
         <div class='main buttonset'> 
            <!-- Class 'cbp-spmenu-open' gets applied to menu and 'cbp-spmenu-push-toleft' or 'cbp-spmenu-push-toright' to the body -->
              <button id='showRightPush'><img src='".base_url("design/enduser/images/menu-icon1.png")."' alt=''/></button>
         </div>
          <!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
          <script src='".base_url("design/enduser/js/classie.js")."'></script>
            <script>
              var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
              showRightPush = document.getElementById( 'showRightPush' ),
              body = document.body;

              showRightPush.onclick = function() {
                classie.toggle( this, 'active' );
                classie.toggle( body, 'cbp-spmenu-push-toleft' );
                classie.toggle( menuRight, 'cbp-spmenu-open' );
                disableOther( 'showRightPush' );
              };

              function disableOther( button ) {
                if( button !== 'showRightPush' ) {
                  classie.toggle( showRightPush, 'disabled' );
                }
              }
            </script>
            <!-- /script-for-menu -->
       </div> 
       <div class='clearfix'></div>
     </div>
   </div>
</div>
<!--about-->";
?>