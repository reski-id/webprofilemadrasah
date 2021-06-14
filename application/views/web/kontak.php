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
                                <li class="active">Kontak</li>
                              </ol>
                              <?php
                                echo $this->session->flashdata('msg');
                              ?>
                              <h3 class="mu-blog-caption">Kontak Kami</h3>

                               <!-- <div class="mu-blog-meta">
                              </div>
                             <figure class="mu-blog-single-img">

                             </figure> -->
                             <div class="mu-blog-description">
                               <hr>
                               <form action="" method="post">
                                  <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required maxlength="100">
                                  </div>
                                  <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Alamat Email" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="pesan">Pesan</label>
                                    <textarea type="text" name="pesan" class="form-control" id="pesan" placeholder="Kritik / Saran" rows="5" required></textarea>
                                  </div>
                                  <button type="submit" name="btnkirim" class="btn btn-success" style="float:right;">Kirim</button>
                               </form>
                               <br>
                               <hr>
                                <ol class="breadcrumb">
                                   <p><b>Phone:</b> <?php echo $web->phone; ?> </p>
                                   <p><b>Website:</b> <?php echo $web->website; ?></p>
                                   <p><b>Email:</b> <?php echo $web->email; ?></p>
                                   <p><b>Alamat:</b> <?php echo $web->alamat; ?></p>
                                </ol>
                             </div>
                             <!-- start blog post tags -->

                             <!-- End blog post tags -->
                           </article>


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
