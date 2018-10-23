<?php
echo"
          <section class='wrapper'>
            <h3><i class='fa fa-angle-right'></i> Data Pelaporan </h3>
          <div class='row mt'>
            <div class='col-lg-12'>
                      <br>
                      <div class='content-panel'>
                      <h4><i class='fa fa-angle-right'></i> Data Pelaporan </h4>
                          <section id='unseen'>
                            <table class='table table-bordered table-striped table-condensed'>
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Judul</th>
                                  <th>Dari</th>
                                  <th>Untuk</th>
                                  <th>Tanggal Pelaporan</th>
                                  <th>Tanggal Selesai</th>
                                  <th>Status</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              <tbody>";
                              $no = 0;
                              foreach($Data->result() as $data){
                                if($data->flag_status == 0){
                                  $status = "Menunggu Antrian";
                                }elseif($data->flag_status == 1){
                                  $status = "Proses Perbaikan";
                                }else{
                                  $status = "Selesai Diperbaiki";
                                }
                                $no++;
                                echo"
                              <tr>
                                  <td>$no</td>
                                  <td>".$data->judul."</td>
                                  <td>".$data->nama_user."</td>";
                                  if($data->to == 0){
                                    $too = "";
                                  }else{
                                    $too = $data->to;
                                  }
                                  echo"
                                  <td>".$too."</td>
                                  <td>".date( "d M Y", strtotime($data->create_date) )."</td>";
                                  if($data->date_finished == 0){
                                    $finish = "";
                                  }else{
                                    $finish = date( "d M Y", strtotime($data->date_finished) );
                                  }
                                  echo"
                                  <td>".$finish."</td>
                                  <td>".$status."</td>
                                  ";
                                  if($_SESSION['data']['level'] != 3){
                                    echo"
                                  <td>
                                    <a class='btn btn-primary' data-toggle='modal' data-target='#myModal_".$data->id."'>Proses Data</a>
                                  </td>
                                  ";}else{
                                    echo"
                                    <td>
                                      No Aksi
                                    </td>
                                    ";
                                  }
                                  echo"
                              </tr>
                              <div class='modal fade' id='myModal_".$data->id."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
                                <div class='modal-dialog'>
                                  <div class='modal-content'>
                                    <div class='modal-header'>
                                      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                      <h4 class='modal-title' id='myModalLabel'>Proses Data</h4>
                                    </div>
                                    <div class='modal-body'>
                                      <div class='form-group'>
                                          <label class='col-sm-12 col-sm-12 control-label'>Judul Pelaporan</label>
                                          <div class='col-sm-12'>
                                              <input type='text' class='form-control' id='judul' name='judul'>
                                          </div>
                                      </div>
                                      <div class='form-group'>
                                          <label class='col-sm-12 col-sm-12 control-label'>Ditangani Oleh</label>
                                          <div class='col-sm-12'>
                                              <select class='form-control' id='handel' name='handel'> 
                                              <option selected value=''>Pilih Karyawan yang akan menangani </option>
                                              "; foreach($Data_Karyawan->result() as $dk){
                                                echo"
                                              <option value='".$dk->id."'>".$dk->name."</option>";}
                                              echo"
                                              </select>
                                          </div>
                                      </div>
                                      <div class='form-group'>
                                          <label class='col-sm-12 col-sm-12 control-label'>Status</label>
                                          <div class='col-sm-12'>
                                              <select class='form-control' id='status' name='status'> 
                                              <option value='1'>Proses Perbaikan</option>
                                              <option value='2'>Selesai Diperbaiki</option>
                                              </select>
                                          </div>
                                      </div>
                                    </div>
                                    <br>
                                    <div class='modal-footer'>
                                      <button type='button' class='btn btn-default' data-dismiss='modal'>Tidak</button>
                                      <button type='button' class='btn btn-primary' onclick=javascript:proses_data(".$data->id.")>Ya</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              ";}
                              echo"
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
          </div><!-- /row -->";?>