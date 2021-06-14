<div class="col-sm-4 col-xs-12">
  <!-- start sidebar -->
  <aside class="mu-sidebar">
    <!-- fans page -->
    <div class="mu-single-sidebar">
      <br>
      <div class="row">
        <div class="text-center hidden-sm hidden-xs">
          <a href="<?php echo $web->fb; ?>"><i style="color: #4867aa;" class="col-md-3 fa fa-facebook fa-3x"></i></a>
          <a href="<?php echo $web->twitter; ?>"><i style="color: #1da1f2;" class="col-md-3 fa fa-twitter fa-3x"></i></a>
          <a href="<?php echo $web->instagram; ?>"><i style="color: #ca3e57;" class="col-md-3 fa fa-instagram fa-3x"></i></a>
          <a href="<?php echo $web->youtube; ?>"><i style="color: #e42b26;" class="col-md-3 fa fa-youtube fa-3x"></i></a>
        </div>
        <div class="text-center hidden-lg hidden-md">
          <a href="<?php echo $web->fb; ?>"><i style="color: #4867aa;" class="col-md-3 fa fa-facebook fa-2x"></i></a>
          <a href="<?php echo $web->twitter; ?>"><i style="color: #1da1f2;" class="col-md-3 fa fa-twitter fa-2x"></i></a>
          <a href="<?php echo $web->instagram; ?>"><i style="color: #ca3e57;" class="col-md-3 fa fa-instagram fa-2x"></i></a>
          <a href="<?php echo $web->youtube; ?>"><i style="color: #e42b26;" class="col-md-3 fa fa-youtube fa-2x"></i></a>
        </div>
      </div>
    </div>
    <div class="mu-single-sidebar">
      <br>
      <div class="fb-page" data-href="<?php echo $web->fb; ?>" data-tabs="timeline" data-width="350" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
        <blockquote cite="<?php echo $web->fb; ?>" class="fb-xfbml-parse-ignore">
          <a href="<?php echo $web->fb; ?>"><?php echo $web->nama_web; ?></a>
        </blockquote>
      </div>
    </div>
    <!-- start single sidebar -->

    <!-- end single sidebar -->

   <!-- start single sidebar -->
    <div class="mu-single-sidebar">
      <h3 class="h-side">Popular</h3>
      <hr style="margin:0px;">
      <div class="mu-sidebar-popular-courses">
        <?php
        foreach ($popular->result() as $baris) {
        ?>
           <div class="media">
               <div class="media-left">
                <a href="detail/<?php echo $baris->id_berita; ?>">
                  <img class="media-object" src="<?php echo $baris->foto_berita; ?>" alt="img">
                </a>
               </div>
               <div class="media-body">
                   <a href="detail/<?php echo $baris->id_berita; ?>">
                       <h4 class="media-heading"><?php echo substr($baris->judul, 0, 50); ?>...</h4>

                       <span class="popular-course-price"><?php echo substr($baris->isi, 0, 50); ?>... </span>
                       <br>
                       <p align=right><a href="detail/<?php echo $baris->id_berita; ?>">[ Baca Selengkapnya ]</a></p>
                   </a>
               </div>
          </div>
          <br>
       <?php
       } ?>
      </div>
    </div>
    <!-- end single sidebar -->

    <!-- start single sidebar -->
     <div class="mu-single-sidebar">
       <h3 class="h-side">Visitors Counter</h3>
       <hr style="margin:0px;">
       <div class="mu-sidebar-popular-courses">
         <div align='center'><a href='http://www.free-website-hit-counter.com'><img src='http://www.free-website-hit-counter.com/c.php?d=9&id=104478&s=5' border='0' title='free website hit counter'></a><br / ><!--<small><a href='http://www.free-website-hit-counter.com' title="free website hit counter">Free website hit counter</a>--></small></div>
        <!-- <link rel="stylesheet" href="assets/visitor/default.css" type="text/css" />-->
        <!-- <style type="text/css">-->
        <!--    .vfleft{float:left;}.vfright{float:right;}.vfclear{clear:both;}.valeft{text-align:left;}.varight{text-align:right;}.vacenter{text-align:center;}-->
        <!--    #vvisit_counter157{border:10px solid #000000;}-->
        <!--    #vvisit_counter157{-->
        <!--      -moz-border-radius: 8px 8px 8px 8px;-->
        <!--      -webkit-border-radius: 8px 8px 8px 8px;-->
        <!--      border-radius: 8px 8px 8px 8px;-->
        <!--    }-->
        <!--    #vvisit_counter157{-->
        <!--      -webkit-box-shadow: 0px 1px 5px 0px #4a4a4a;-->
        <!--      -moz-box-shadow: 0px 1px 5px 0px #4a4a4a;-->
        <!--      box-shadow: 0px 1px 5px 0px #4a4a4a;-->
        <!--    }-->
        <!--    #vvisit_counter157 .vstats_counter{margin-top: 5px;}-->
        <!--    #vvisit_counter157 .vrow{height:24px;}-->
        <!--    #vvisit_counter157 .vstats_icon{margin-right:5px;}-->
        <!--    #vvisit_counter157{padding:5px;}-->
        <!--</style>-->
        <!-- <div class="col-md-1"></div>-->
        <!-- <div class="col-md-10">-->
        <!--   <div id="vvisit_counter157" class="vvisit_counter vacenter">-->
        <!--    <div class="vdigit_counter"><span class="vdigit-2" title="Vinaora Visitors Counter">2</span><span class="vdigit-2" title="Vinaora Visitors Counter">2</span><span class="vdigit-7" title="Vinaora Visitors Counter">7</span><span class="vdigit-9" title="Vinaora Visitors Counter">9</span><span class="vdigit-3" title="Vinaora Visitors Counter">3</span><span class="vdigit-3" title="Vinaora Visitors Counter">3</span><span class="vdigit-0" title="Vinaora Visitors Counter">0</span></div>-->
        <!--    <div class="vstats_counter">-->
        <!--      <div class="vstats_icon vfleft varight">-->
        <!--        <div class="vrow vstats-vtoday" title="2017-08-30"></div><div class="vfclear"></div><div class="vrow vstats-vyesterday" title="2017-08-29"></div><div class="vfclear"></div><div class="vrow vstats-vxweek" title="2017-08-27"></div><div class="vfclear"></div><div class="vrow vstats-vlweek" title="2017-08-20"></div><div class="vfclear"></div><div class="vrow vstats-vxmonth" title="2017-08-01"></div><div class="vfclear"></div><div class="vrow vstats-vlmonth" title="2017-07-01"></div><div class="vfclear"></div><div class="vrow vstats-vall" title=""></div><div class="vfclear"></div>		</div>-->
        <!--      <div class="vstats_title vfleft valeft">-->
        <!--        <div class="vrow" title="">Today</div><div class="vfclear"></div><div class="vrow" title="">Yesterday</div><div class="vfclear"></div><div class="vrow" title="">This Week</div><div class="vfclear"></div><div class="vrow" title="">Last Week</div><div class="vfclear"></div><div class="vrow" title="">This Month</div><div class="vfclear"></div><div class="vrow" title="">Last Month</div><div class="vfclear"></div><div class="vrow" title="">All days</div><div class="vfclear"></div>		</div>-->
        <!--      <div class="vstats_number varight">-->
        <!--        <div class="vrow" title="">9191</div><div class="vrow" title="">3470</div><div class="vrow" title="">21517</div><div class="vrow" title="">2226227</div><div class="vrow" title="">141069</div><div class="vrow" title="">163185</div><div class="vrow" title="">2279330</div>		</div>-->
        <!--      <div class="vfclear"></div>-->
        <!--    </div>-->
        <!--    <hr style="margin-bottom: 5px;">-->
        <!--    <div style="margin-bottom: 5px;">Your IP: 5.189.139.213</div>-->
        <!--    <div>Server Time: 2017-08-30 10:09:19</div>-->
        <!--   </div>-->
        <!--   <br>-->
        <!-- </div>-->
        <!-- <div class="col-md-1"></div>-->
       </div>

     </div>
     <!-- end single sidebar -->

     <!-- start single sidebar -->
      <div class="mu-single-sidebar">
        <h3 class="h-side">Vieo Profile</h3>
        <hr style="margin:0px;">
        <div class="mu-sidebar-popular-courses">
          <iframe width="100%" height="250" src="https://www.youtube.com/embed/2knRSgRxfLA?ecver=1" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
      <!-- end single sidebar -->

  </aside>
  <!-- / end sidebar -->
</div>
