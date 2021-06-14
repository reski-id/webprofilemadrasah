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
          <h5 class="panel-title">Slide</h5>
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
                <!-- <div class="form-group">
                  <label class="control-label col-lg-2">Nama Galeri</label>
                  <div class="col-lg-10">
                    <input type="text" name="nama_galeri" class="form-control" value="" required maxlength="100" placeholder="Nama Galeri">
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="control-label col-lg-2">Foto</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto" class="form-control" value="" required>
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
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30">No.</th>
              <th>Foto</th>
              <!-- <th>Nama Galeri</th> -->
              <th width="200">Tanggal</th>
              <th class="text-center" width="100"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_slide->result() as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><img src="<?php echo $baris->foto_slide; ?>" alt="-" class="img-responsive" width="200"></td>
                  <!-- <td><?php echo $baris->nama_galeri; ?></td> -->
                  <td><?php echo $baris->tgl_slide; ?></td>
                  <td>
                    <a href="admin/slide_edit/<?php echo $baris->id_slide; ?>" title="Edit"><span class="icon-pencil"></span></a>
                    &nbsp;
                    <a href="admin/slide_hapus/<?php echo $baris->id_slide; ?>" title="Hapus"><span class="icon-trash" onclick="return confirm('Anda Yakin?')"></span></a>
                  </td>
                </tr>
              <?php
              $no++;
              } ?>
          </tbody>
        </table>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
