<section>
  <div class="row" style="padding-top:50px;">
    <div class="col-xs-12">
      <div class="blog-header  hidden-sm hidden-xs">
        <div class="container">
          <img src="img/header.jpg" alt="image" class="img-responsive" width="100%">
        </div>
      </div>
    </div>
  </div>
</section>
<section id="mu-course-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-course-content-area">
           <div class="row">
               <div class="col-md-8">
                     <!-- start course content container -->
                     <div class="mu-course-container mu-blog-single">
                       <div class="row">
                         <div class="col-md-12">
                           <article class="mu-blog-single-item">
                              <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Pencarian</li>
                              </ol>

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
                                   <?php echo substr($baris->isi, 0, 500); ?>...
                                 </div>
                                   <a class="mu-read-more-btn" href="detail/<?php echo $baris->id_berita; ?>">Baca Selengkapnya</a>
                                 <hr>
                               </div>
                               <?php
                               }  ?>
                             <!-- start blog post tags -->

                             <?php
                             if ($berita->num_rows() == 0) {?>
                               <center><h3>Pencarian "<?php echo $this->uri->segment(2); ?>" tidak ditemukan</h3></center>
                            <?php
                             } ?>
                             <!-- End blog post tags -->
                           </article>

                           <div class="text-left">
                             <?php echo $halaman; ?>
                           </div>

                         </div>
                       </div>
                     </div>
 <!-- end course content container -->

 <!-- start related course item -->

 <!-- end start related course item -->
           <div class="fb-comments" data-href="" data-width="100%" data-numposts="5" data-mobile="true"></div>
          </div>
            <?php $this->load->view("web/widget"); ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
