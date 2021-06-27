
          <div class="section-body">
             <?php $this->load->view('frontend/user_member'); ?>
                <div class="col-lg-9 col-md-6 col-sm-6 col-12">
                            <div class="row">
                                <?php if(count($produk) > 0) { ?>
                                                        
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="card-mb-0">
                                                <div class="card-body">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item">
                                                            <a href="<?php echo site_url('toko/create_produk/'. $this -> uri -> segment(3)) ?>" class="nav-link active"> Silahkan tambah produk  </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>  
              <div class="col-12">
                <div class="card mb-0">
                  <div class="card-body">
                    <ul class="nav nav-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Menunggu Konfirmasi <span class="badge badge-white">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Diproses <span class="badge badge-primary">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Dikirim <span class="badge badge-primary">1</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Sampai Tujuan <span class="badge badge-primary"></span>0</a>
                      </li>
               
                    </ul>
                  </div>
                </div>
              </div>
            </div><br>

     <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                   <a href="#" class="btn btn-danger">View More<i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Invoice ID</th>
                        <th>Pelanggan</th>
                        <th>Status</th>
                        <th>Jatuh Tempo</th>
                        <th>Action</th>
                      </tr>
											<tr>
                        <td><a href="#">12345</a></td>
                        <td class="font-weight-600">Bagus</td>
                        <td><div class="badge badge-warning">Y</div></td>
												<td>10 Juni 2021</td>
                        <td>
                          <a href="#" class="btn btn-primary">Detail</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              </div>
              <?php } else { ?>
                                    <div class="row">                      
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                            <div class="card-mb-0">
                                                <div class="card-body">
                                                    <ul class="nav nav-pills">
                                                        <li class="nav-item">
                                                            <a href="<?php echo site_url('toko/create_produk/'. $this -> uri -> segment(3)); ?>" class="nav-link active"> Silahkan Memasukan Produk Baru </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>                             
                                        </div>
                                    </div>
                                <?php } ?>

			
            </div>
  		    </div>
        </div>
      	</section>
      </div>
