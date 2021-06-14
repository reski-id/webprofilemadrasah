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
          <h5 class="panel-title">Tambah Berita</h5>
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
                    <input type="text" name="judul" class="form-control" value="" required maxlength="100">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kategori Berita</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kat_berita" required>
                      <option value="">-- Pilih Kategori Berita --</option>
                      <?php
                      foreach ($v_kat_berita->result() as $baris) { ?>
                        <option value="<?php echo $baris->id_kat_berita; ?>"><?php echo $baris->nama_kat_berita; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Foto Berita</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto" class="form-control" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Isi Berita</label>
                  <div class="col-lg-10">
                    <textarea name="isi" rows="3" cols="80" class="summernote" required></textarea>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

        <hr>
        <div class="table-responsive">
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Judul Berita</th>
              <th>Kategori Berita</th>
              <th>Foto Berita</th>
              <th>Isi Berita</th>
              <th>Tanggal Berita</th>
              <th>Dilihat</th>
              <th class="text-center" width="150"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_berita->result() as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->judul; ?></td>
                  <td><?php echo $baris->nama_kat_berita; ?></td>
                  <td><img src="<?php echo $baris->foto_berita; ?>" alt="" width="100" class="img-responsive"></td>
                  <td><?php
                        $isi = substr($baris->isi, 0, 500);
                        // $isi = substr($baris->isi, 0,strrpos($isi," "));
                         echo $isi;
                      ?>...
                  </td>
                  <td><?php echo $baris->tgl_berita; ?></td>
                  <td><?php echo $baris->dilihat; ?></td>
                  <td>
                    <a href="detail/<?php echo $baris->id_berita; ?>" title="Lihat" target="_blank"><span class="icon-eye"></span></a> &nbsp;
                    <a href="admin/berita_edit/<?php echo $baris->id_berita; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="admin/berita_hapus/<?php echo $baris->id_berita; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
                  </td>
                </tr>
              <?php
              $no++;
              } ?>
          </tbody>
        </table>
        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
