<?php
$this->db->order_by('id_slide', 'DESC');
$slide = $this->db->get('tbl_slide'); ?>
    <!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
    <?php
    foreach ($slide->result() as $baris) {?>
      <div class="mu-slider-single">
        <div class="mu-slider-img">
          <figure>
            <img src="<?php echo $baris->foto_slide; ?>" alt="img">
          </figure>
        </div>
      </div>
    <?php
    } ?>

  </section>
  <!-- End Slider -->
