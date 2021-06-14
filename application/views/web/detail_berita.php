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
                                <li><?php echo $v_detail->nama_kat_berita; ?></li>
                                <li class="active"><?php echo $v_detail->judul; ?></li>
                              </ol>
                              <h3 class="mu-blog-caption"><?php echo $v_detail->judul; ?></h3>
                               <div class="mu-blog-meta">
                                 <a ><i class="fa fa-user"></i> Admin</a>
                                 <a ><i class="fa fa-calendar"></i> <?php echo $v_detail->tgl_berita; ?></a>
                                 <a href="kat/<?php echo $v_detail->id_kat_berita; ?>"><span><i class="fa fa-tag"> <?php echo $v_detail->nama_kat_berita; ?></i></span></a>
                               </div>
                             <figure class="mu-blog-single-img">
                               <a href="#"><img class="img-responsive" src="<?php echo $v_detail->foto_berita; ?>" alt="img" style="height:300px;"></a>
                             </figure>
                             <div class="mu-blog-description">
                               <?php echo $v_detail->isi; ?>

                               <br>

                               <!-- start blog social share -->
                               <div class="">
                                 <hr>
                                   <b>SOCIAL SHARE :</b>
                                   <a class="btn btn-default" target="_blank"  onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>detail/<?php echo $v_detail->id_berita; ?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)"><span class="fa fa-facebook"></span></a>
                                   <a class="btn btn-default" target="_blank" href="javascript:void(0);" onclick="popUp=window.open('http://twitter.com/share?source=sharethiscom&text=<?php echo $v_detail->judul;?>&url=<?php echo base_url(); ?>detail/<?php echo $v_detail->id_berita; ?>&via=berbagiyuks','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false"><span class="fa fa-twitter"></span></a>
                                   <a class="btn btn-default" target="_blank" href="javascript:void(0);" onclick="popUp=window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url(); ?>detail/<?php echo $v_detail->id_berita; ?>&title=<?php echo $v_detail->judul;?>&summary=<?php echo $v_detail->nama_kat_berita;?>&source=BerbagiYuks','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false"><span class="fa fa-linkedin"></span></a>
                                   <a class="btn btn-default" target="_blank" href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo base_url(); ?>detail/<?php echo $v_detail->id_berita; ?>','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false"><span class="fa fa-google-plus"></span></a>
                               </div>
                               <!-- End blog social share -->

                             <!-- start blog post tags -->

                             <!-- End blog post tags -->
                             <hr>
                               <div id="disqus_thread"></div>
                                <script>

                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                /*
                                var disqus_config = function () {
                                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };
                                */
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://httpwwwdarulmarhamahcom.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                              </div>
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
