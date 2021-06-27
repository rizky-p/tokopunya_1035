<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row"> 
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
              <?php echo $this->session->flashdata('pesan'); ?>
              <div class="card card-primary">
                <div class="card-header"><h4>Login</h4></div>

                <div class="card-body">
                   <div class="container">
                  <form method="POST" action="<?php echo site_url('member/act_login'); ?>">
                    <div class="form-group">
                      <label for="email">Username</label>
                      <input id="email" type="text" class="form-control" name="username">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Password</label>
                      <input id="email" type="password" class="form-control" name="password">
                      <div class="invalid-feedback">
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Login
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="simple-footer">
                Copyright &copy; Stisla 2018
              </div>
            </div>
          </div>
        </section>
      </div>