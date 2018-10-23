<?php
echo"
          <section class='wrapper'>
            <h3><i class='fa fa-angle-right'></i> Monitoring Server </h3>
          <div class='row mt'>
            <div class='col-lg-12'>
                      <br>
                      <div class='content-panel'>
                      <h4><i class='fa fa-angle-right'></i> Monitoring Server </h4>
                          <section id='unseen'>
                            <table class='table table-bordered table-striped table-condensed'>
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Alias</th>
                                  <th>Location</th>
                                  <th>UP Time</th>
                                  <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>";
                              $no = 0;
                              foreach($Data as $key => $value){
                                $no++;
                                echo"
                              <tr>
                                  <td>$no</td>
                                  <td>".$value['alias']."</td>
                                  <td>".$value['location']."</td>
                                  <td>".$value['uptime']."</td>";
                                  if($value['status'] == "DOWN"){
                                    $st_p = "<p style='color:red;'>";
                                  }else{
                                    $st_p = "<p>";
                                  }
                                  echo"
                                  <td>".$st_p."".$value['status']."</p></td>
                              </tr>
                              ";}
                              echo"
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
          </div><!-- /row -->";?>