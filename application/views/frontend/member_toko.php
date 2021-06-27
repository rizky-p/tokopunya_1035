
          <div class="section-body">
             <?php $this->load->view('frontend/user_member'); ?>
             <div class="col-lg-8 col-md-12 col-sm-12 col-12">
              <div class="col-md-12">
              <?php if(count($toko)>0) { ?>
                <div class="row">
              <div class="col-12">
                <div class="card mb-0">
                  <div class="card-body">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="<?php echo site_url('member/form_toko_add') ?>">Silakan Membuat Toko</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><br>
              <?php } else { ?>
					    <div class="row">
              <div class="col-12">
                <div class="card mb-0">
                  <div class="card-body">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="<?php echo site_url('member/form_toko_add') ?>">Silakan Membuat Toko</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><br>
            <?php } ?>

            <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Toko</h4>
                  <div class="card-header-action">
                   
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Nama Toko</th>
                        <th>Deskripsi</th>
                        <th>Logo</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      <?php foreach($toko as $val) { ?>
											<tr>
                        <td><?php echo $val['namaToko'];?></td>
                        <td class="font-weight-600"><?php echo $val['deskripsi'];?></td>
												<td><?php echo $val['logo'];?></td>
                        <td><div class="badge badge-warning"><?php echo $val['StatusAktif'];?></div></td>
                        <td>
                          <a href="<?php echo site_url('toko/main/'. $val['idToko']); ?>" class="btn btn-primary" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                    <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              </div>
            </div>
  		    </div>
        </div>
      	</section>
      </div>