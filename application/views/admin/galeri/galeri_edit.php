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
          <h5 class="panel-title">Edit Galeri</h5>
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
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Album</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kat_galeri" required>
                      <option value="">-- Pilih Album --</option>
                      <?php
                      foreach ($v_kat_galeri->result() as $baris) {?>
                        <option value="<?php echo $baris->id_kat_galeri; ?>" <?php if($baris->id_kat_galeri==$v_galeri->id_kat_galeri){echo "selected";} ?>><?php echo $baris->nama_kat_galeri; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Galeri</label>
                  <div class="col-lg-10">
                    <input type="text" name="nama_galeri" class="form-control" value="<?php echo $v_galeri->nama_galeri; ?>" required maxlength="100">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Foto</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto" class="form-control" value="">
                    <i>*boleh dikosongkan jika tidak diubah</i>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <a href="admin/galeri" class="btn btn-default">Kembali</a>
            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->