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
          <h5 class="panel-title">Edit Berita</h5>
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
                  <label class="control-label col-lg-2">Judul</label>
                  <div class="col-lg-10">
                    <input type="text" name="judul" class="form-control" value="<?php echo $v_berita->judul; ?>" required maxlength="100">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kategori Berita</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kat_berita" required>
                      <option value="">-- Pilih Kategori --</option>
                      <?php
                      foreach ($v_kat_berita->result() as $baris) { ?>
                        <option value="<?php echo $baris->id_kat_berita; ?>" <?php if ($baris->id_kat_berita == $v_berita->id_kat_berita){ echo "selected";} ?>><?php echo $baris->nama_kat_berita; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Foto Berita</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto" class="form-control" value="">
                    <i>*boleh dikosongkan jika tidak diubah</i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Isi Berita</label>
                  <div class="col-lg-10">
                    <textarea name="isi" rows="3" cols="80" class="summernote" required><?php echo $v_berita->isi; ?></textarea>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <a href="admin/berita" class="btn btn-default">Kembali</a>
            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
