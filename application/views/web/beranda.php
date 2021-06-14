<section id="mu-course-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-course-content-area">
           <div class="row">
               <div class="col-sm-8">
                 <!-- start course content container -->
                 <div class="mu-course-container mu-blog-single">
                   <div class="row">
                     <div class="col-md-12">
                       <article class="mu-blog-single-item">
                         <?php
                         foreach ($berita->result() as $baris) {
                         ?>
                          <figure class="mu-blog-single-img">
                              <a href="#"><img class="img-responsive" src="<?php echo $baris->foto_berita; ?>" alt="img" style="height:300px;"></a>
                          </figure>
                          <h3 class="mu-blog-caption">
                              <a href="detail/<?php echo $baris->id_berita; ?>"><?php echo $baris->judul; ?></a>
                          </h3>
                          <div class="mu-blog-meta">
                             <a ><i class="fa fa-user"></i> Admin</a>
                             <a ><i class="fa fa-calendar"></i> <?php echo $baris->tgl_berita; ?></a>
                             <a href="kat/<?php echo $baris->id_kat_berita; ?>"><span><i class="fa fa-tag"> <?php echo $baris->nama_kat_berita; ?></i></span></a>
                          </div>
                          <div class="mu-blog-description">
                            <div>
                              <?php 
                                $isi = substr($baris->isi, 0, 500); 
                                // $isi = substr($baris->isi, 0,strrpos($isi," "));
                                echo $isi;
                              ?>...
                              <br><br>
                            </div>
                              <p align=right><a class="mu-read-more-btn" href="detail/<?php echo $baris->id_berita; ?>">Baca Selengkapnya</a></p>
                            <hr>
                          </div>
                          <?php
                          }  ?>
                       </article>

                       <div class="text-center">
                         <?php echo $halaman; ?>
                       </div>

                     </div>
                   </div>
                 </div>
                 <!-- end course content container -->
               </div>

             <?php $this->load->view("web/widget"); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
