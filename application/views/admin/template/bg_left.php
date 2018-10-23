<?php
echo"
      <aside>
          <div id='sidebar'  class='nav-collapse '>
              <!-- sidebar menu start-->
              <ul class='sidebar-menu' id='nav-accordion'>
              
              	  <p class='centered'><a href='".base_url()."'><img src='".base_url("design/assets/img/friends/fr-05.jpg")."' class='img-circle' width='60'></a></p>";
                  $level = 0;
                  if($_SESSION['data']['level'] == 1){
                       $level_nama = "Manager IT / Administrasi IT";
                    }elseif($_SESSION['data']['level'] == 2){
                       $level_nama = "IT SUPPORT / Manager IT";
                    }else{
                        $level_nama = "Karyawan";
                    }
                    echo"
              	  <h5 class='centered'>".$level_nama."</h5>";
                    if($this->uri->segment(2) == "data"){
                      $klass = "";
                    }else{
                      $klass = "class='active'";
                    }
              	  	 echo"
                  <li class='mt'>
                      <a  $klass href='".base_url("admin")."'>
                          <i class='fa fa-dashboard'></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class='sub-menu'>";
                    if($this->uri->segment(3) == "data_pelaporan" || $this->uri->segment(3) == "input_data_pelaporan" ){
                      $klas = "class='dcjq-parent active'";
                    }else{
                      $klas = "";
                    }
                    echo"
                      <a href='javascript:;' $klas  >
                          <i class='fa fa-desktop'></i>
                          <span>Data Pelaporan</span>
                      </a>
                      <ul class='sub'>";
                          if($_SESSION['data']['level'] == 3){
                            echo"
                          <li><a  href='".base_url("admin/data/input_data_pelaporan")."'>Input Pelaporan</a></li>";
                          }
                          echo"
                          <li><a  href='".base_url("admin/data/data_pelaporan")."'>Lihat Data Pelaporan</a></li>
                      </ul>
                  </li>
                  ";
                    if($this->uri->segment(3) == "monitoring_server"){
                      $klas_m = "class='dcjq-parent active'";
                    }else{
                      $klas_m = "";
                    }

                    if($_SESSION['data']['level'] == 3){
                    }else{
                    echo"
                  <li class='mt'>
                      <a  $klas_m href='".base_url("admin/data/monitoring_server")."'>
                          <i class='fa fa-database'></i>
                          <span>Monitoring Status Server</span>
                      </a>
                  </li>";}
                  echo"

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <section id='main-content'>
";?>