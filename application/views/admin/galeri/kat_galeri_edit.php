<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Edit Album</h5>
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
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Album</label>
                  <div class="col-lg-10">
                    <input type="text" name="nama_kat_galeri" class="form-control" value="<?php echo $v_kat_galeri->nama_kat_galeri; ?>" required maxlength="100">
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <a href="admin/kat_galeri" class="btn btn-default">Kembali</a>

            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
