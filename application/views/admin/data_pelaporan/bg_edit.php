<?php
echo"
          <section class='wrapper'>
          	<h3><i class='fa fa-angle-right'></i> Edit Data Struktur Masjid</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class='row mt'>
          		<div class='col-lg-12'>
                  <div class='form-panel'>
                  	  <h4 class='mb'><i class='fa fa-angle-right'></i> Edit Data Struktur Masjid</h4>
                      <form class='form-horizontal style-form' id='dataAdd'>
                          <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Deskripsi</label>
                              <div class='col-sm-6'>
                                  <textarea class='form-control' id='description' name='description' style='margin: 0px -313px 0px 0px; height: 142px; width: 842px;'>'".$Data->description."'</textarea>
                              </div>
                          </div>
                          <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'> </label>
                              <div class='col-sm-6'>
                                  <a class='btn btn-primary' hre='#!' onclick=javascript:save_deskripsi_edit(".$Data->id.")>Simpan</a>
                              </div>
                          </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
        </div><!-- /row -->
    </section>

";?>