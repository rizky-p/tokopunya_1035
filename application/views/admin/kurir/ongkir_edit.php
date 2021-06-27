<!-- Main Content -->
  <div class="main-content">
    <section class="section"> 
      <div class="section-header">
        <h1>Manajemen Ongkos Pengiriman</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Jasa Pengiriman</a></div>
          <div class="breadcrumb-item">Ongkos Kirim</a></div>
        </div>
      </div> 

      <div class="section-body">
        <div class="row"> 
          <div class="col-12 col-md-6 col-lg-6">
            <form method="POST" action="<?php echo site_url('ongkir/edit') ;?>">
               <input type="hidden" name="idBiayaKirim" value="<?php echo $ongkir->idBiayaKirim; ?>">
            <div class="card">
              <div class="card-header">
                <h3>Form Edit Ongkos Kirim</h3>
              </div>
              <div class="card-body">
                <div class="form-group row mb-4">
                   <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Nama Kurir</label>
                  <div class="col-sm-12 col-md-7">
                     <select class="form-control selectric" name="kurir">
                       <option> </option>
                       <?php foreach ($kurir as $item) {?>
                        <option value="<?php echo $item->idKurir;?>"><?php echo $item->namaKurir;?></option>
                       <?php }?>
                     </select>
                   </div>
                 </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Kota Asal</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" name="asal">
                      <option> </option>
                        <?php foreach ($kota as $item) {?>
                        <option value="<?php echo $item->idKota;?>"><?php echo $item->namaKota;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Kota Tujuan</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" name="tujuan">
                      <option> </option>
                        <?php foreach ($kota as $item) {?>
                        <option value="<?php echo $item->idKota;?>"><?php echo $item->namaKota;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Ongkos Kirim</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" id="inputEmail3" name="biaya" placeholder="Ongkir" value="<?php echo $ongkir->biaya;?>">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-left col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>