<?php
echo"
          <section class='wrapper'>
          	<h3><i class='fa fa-angle-right'></i> Input Data Pelaporan </h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class='row mt'>
          		<div class='col-lg-12'>
                  <div class='form-panel'>
                  	  <h4 class='mb'><i class='fa fa-angle-right'></i> Input Data Pelaporan </h4>
                      <form class='form-horizontal style-form' id='dataAdd'>
                          <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Judul Pelaporan</label>
                              <div class='col-sm-6'>
                                  <input type='text' class='form-control' id='judul' name='judul'>
                              </div>
                          </div>
                          <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Deskripsi</label>
                              <div class='col-sm-6'>
                                  <textarea class='form-control' id='deskripsi' name='deskripsi'> </textarea>
                              </div>
                          </div>";
                          if($_SESSION['data']['level'] != 3){
                            echo"
                          <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Ditangani Oleh</label>
                              <div class='col-sm-6'>
                                  <select class='form-control' id='handel' name='handel'> 
                                  <option selected value=''>Pilih Karyawan yang akan dipilih </option>
                                  "; foreach($Data_Karyawan->result() as $dk){
                                    echo"
                                  <option value='".$dk->id."'>".$dk->name."</option>";}
                                  echo"
                                  </select>
                              </div>
                          </div>";}
                          echo"
                          <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'> </label>
                              <div class='col-sm-6'>
                                  <a class='btn btn-primary' hre='#!' onclick=javascript:save_pelaporan()>Kirim Pelaporan</a>
                              </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
        </div><!-- /row -->
    </section>

";?>