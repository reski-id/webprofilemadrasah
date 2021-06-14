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
                                <li class="active">Album Galeri</li>
                              </ol>
                              <!-- <h3 class="mu-blog-caption">Galeri</h3> -->

                               <!-- <div class="mu-blog-meta">
                              </div>
                             <figure class="mu-blog-single-img">

                             </figure> -->
                             <div class="mu-blog-description">
                               <div class="col-md-12">
                               <?php
                               foreach ($galeri->result() as $baris) {
                                  $this->db->order_by('id_galeri', 'ASC');
                                  $this->db->limit(1);
                                  $cek_galeri = $this->Mcrud->get_data_by_pk('tbl_galeri', 'id_kat_galeri', $baris->id_kat_galeri);

                                  if ($cek_galeri->num_rows() != 0) {
                                    $foto = $cek_galeri->row()->foto_galeri;
                                 ?>
                                    <div class="col-md-3">
                                      <a href="galeri_d/<?php echo $baris->id_kat_galeri; ?>" class="swipebox" title="<?php echo ucwords($baris->nama_kat_galeri); ?>">
                                        <div class="panel panel-default">
                                          <div class="panel-body" style="padding:0px;">
                                            <img src="<?php echo $foto; ?>" alt="" width="100%" height="150">
                                          </div>
                                          <div class="panel-footer" style="color:#222;"> <b> <?php echo ucwords($baris->nama_kat_galeri); ?></b></div>
                                        </div>
                                      </a>
                                    </div>
                                <?php
                                  }
                               } ?>
                               </div>
                             </div>
                             <!-- start blog post tags -->

                             <!-- End blog post tags -->
                           </article>

                           <div class="text-center">
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
