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
                                <li><a href="galeri">Album Galeri</a></li>
                                <li class="active"><?php echo ucwords($galeri->row()->nama_kat_galeri); ?></li>
                              </ol>
                              <!-- <h3 class="mu-blog-caption">Galeri</h3> -->

                               <!-- <div class="mu-blog-meta">
                              </div>
                             <figure class="mu-blog-single-img">

                             </figure> -->

                               <a href="galeri" class="btn btn-primary"> << Album</a>
                             <div class="mu-blog-description">
                               <div class="col-md-12">
                                 <br>
                               <?php
                               foreach ($galeri->result() as $baris) {?>
                                <div class="col-md-3">
                                  <a href="<?php echo $baris->foto_galeri; ?>" class="swipebox" title="<?php echo ucwords($baris->nama_galeri); ?>">
                                    <div class="panel panel-default">
                                      <div class="panel-body" style="padding:0px;">
                                        <img src="<?php echo $baris->foto_galeri; ?>" alt="" width="100%" height="150">
                                      </div>
                                      <div class="panel-footer" style="color:#222;"> <b> <?php echo ucwords($baris->nama_galeri); ?></b></div>
                                    </div>
                                  </a>
                                </div>
                                <?php
                               } ?>
                               <script src="assets/swipebox/js/jquery.swipebox.js"></script>
                               <script type="text/javascript">
                     						jQuery(function($) {
                     							$(".swipebox").swipebox();
                     						});
                     				   </script>
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
