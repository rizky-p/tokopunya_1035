      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Produk</a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Produk</h4><a href="<?php echo site_url('produk/add');?>" class="btn btn-primary"> Tambah Produk</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>Kategori</th>
                          <th>Toko</th>
                          <th>Nama Produk</th>
                          <th>foto</th>
                          <th>Harga</th>
                          <th>Stok</th>
                          <th>Berat</th>
                          <th>Deskripsi Produk</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($produk as $item) {?>
                        <tr>
                          <td><?php echo $item->namaProduk;?></td>
                          <td><a href="<?php echo site_url('produk/getid/'.$item->idProduk);?>" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a></td>
                        </tr>
                      <?php }?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>