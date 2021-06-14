<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-lg-12">

        <!-- Quick stats boxes -->
        <div class="row">
          <div class="col-lg-6">

            <!-- Current server load -->
            <div class="panel bg-primary">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo number_format($v_berita->num_rows(),0,",","."); ?></h3>
                Jumlah Berita
              </div>

              <div id="server-load"></div>
            </div>
            <!-- /current server load -->

          </div>

          <div class="col-lg-6">

            <!-- Current server load -->
            <div class="panel bg-teal-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo number_format($v_galeri->num_rows(),0,",","."); ?></h3>
                Jumlah Galeri
              </div>

              <div id="server-load"></div>
            </div>
            <!-- /current server load -->

          </div>

        </div>
        <!-- /quick stats boxes -->

        <div class="row">
          <!-- Basic datatable -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Pengaturan Web</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                  <li><a data-action="collapse"></a></li>
                </ul>
              </div>
            </div>
            <hr>
            <div class="panel-body">
              <?php
              echo $this->session->flashdata('msg');
              ?>
              <form class="form-horizontal" action="" method="post">
                <div class="col-md-12">
                    <div class="form-group">
                      <label class="control-label col-lg-2">Nama Web</label>
                      <div class="col-lg-10">
                        <input type="text" name="nama_web" class="form-control" value="<?php echo $v_web->nama_web; ?>" required maxlength="100">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Phone</label>
                      <div class="col-lg-10">
                        <input type="text" name="phone" class="form-control" value="<?php echo $v_web->phone; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Website</label>
                      <div class="col-lg-10">
                        <input type="text" name="website" class="form-control" value="<?php echo $v_web->website; ?>" required maxlength="200">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">email</label>
                      <div class="col-lg-10">
                        <input type="email" name="email" class="form-control" value="<?php echo $v_web->email; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">alamat</label>
                      <div class="col-lg-10">
                        <textarea type="text" name="alamat" class="form-control" required><?php echo $v_web->alamat; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Facebook</label>
                      <div class="col-lg-10">
                        <input type="text" name="fb" class="form-control" value="<?php echo $v_web->fb; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Twitter</label>
                      <div class="col-lg-10">
                        <input type="text" name="twitter" class="form-control" value="<?php echo $v_web->twitter; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Instagram</label>
                      <div class="col-lg-10">
                        <input type="text" name="instagram" class="form-control" value="<?php echo $v_web->instagram; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-lg-2">Youtube</label>
                      <div class="col-lg-10">
                        <input type="text" name="youtube" class="form-control" value="<?php echo $v_web->youtube; ?>" required>
                      </div>
                    </div>
                </div>

                <br>
                <hr>
                
                <button type="reset" class="btn btn-default">Reset</button>

                <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

              </form>
            </div>
            <br>

          </div>
          <!-- /basic datatable -->
        </div>


      </div>


    </div>
    <!-- /dashboard content -->
