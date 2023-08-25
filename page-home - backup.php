<?php
/**
 * Template Name: Home Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package convertbunny
 */

get_header();
?>

    <section class="hero_section py-5" id="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                <h1 class="text-uppercase">
                    <?php echo nl2br( get_field('hb_left_title') ); ?>
                    <mark><?php the_field('hb_left_highlighted_text'); ?></mark>
                </h1>
                <p>
                    <?php the_field('hb_left_subtitle'); ?>
                </p>
                </div>
                <div class="col-md-5">
                    <?php 
                        if( isset( $_GET['theme_style'] ) == 'dark' ) {
                          echo wp_get_attachment_image( 
                            get_field('hb_right_image_dark'), 
                            array('468', '310'),
                            "",
                            array( "class" => "img-fluid" ) ); 
                        } 
                        else {
                          echo wp_get_attachment_image( 
                            get_field('hb_right_image'), 
                            array('468', '310'),
                            "",
                            array( "class" => "img-fluid" ) ); 
                        }
                    ?>
                </div>
            </div>
            <div class="sec_sb d-flex align-items-center mt-6 pt-4">
                <div class="icon mx-4">
                    <?php 
                        if( isset( $_GET['theme_style'] ) == 'dark' ) {
                          echo wp_get_attachment_image( 
                            get_field('hb_left_image_dark'), 
                            'thumbnail',
                            "",
                            array( "class" => "img-fluid" ) );   
                        } 
                        else {
                          echo wp_get_attachment_image( 
                            get_field('hb_left_image'), 
                            'thumbnail',
                            "",
                            array( "class" => "img-fluid" ) );   
                        }
                    ?>
                </div>
                <div class="text">
                <p><?php the_field('hb_middle_description'); ?></p>
                </div>
            </div>
        </div>
        <div class="line">
            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/line.svg" alt="">
        </div>
    </section>

	<?php /*
    <section class="section_2 py-5">
        <div class="container">
            <div class="first_sec d-flex align-items-center justify-content-between">
                <h2><?php echo nl2br( get_field('p_title') ); ?></h2>
                <?php echo wp_get_attachment_image( 
                    get_field('p_image'), 
                    array('204', '242'),
                    "",
                    array( "class" => "img-fluid" ) );  
                ?>
            </div>
            <div class="arrow">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-white.svg" alt="">
            </div>
            <div class="bunnylist">
                <?php
                    if( have_rows('partner_services') ) : $i = 1;
                        while( have_rows('partner_services') ) : the_row();
                ?>
                            <div class="bunnybox">
                                <small>0<?php echo esc_html( $i ); ?>.</small>
                                <h3><?php echo esc_html( get_sub_field('title') ); ?></h3>
                                <a href="javascript:void(0)" data-bs-toggle="tooltip" 
                                    title="<?php echo esc_html( get_sub_field('description') ); ?>
                                ">
                                    EXPLORE 
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/round-arrow.svg" alt="arrow">
                                </a>
                            </div>
                <?php
                        $i++;
                        endwhile;
                    endif;
                ?>
            </div>
            <p class="dontlet"><?php the_field('p_description'); ?></p>
        </div>
  </section>
*/ ?>
 <section class="section_2 py-5" id="services">
    <div class="container">
        <div class="first_sec d-flex align-items-center justify-content-between">
		  <h2><?php echo nl2br( get_field('p_title') ); ?></h2>
		  <?php echo wp_get_attachment_image( 
			get_field('p_image'), 
			array('204', '242'),
			"",
			array( "class" => "img-fluid" ) );  
		  ?>
		</div>
		<div class="arrow">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-white.svg" alt="">
		</div>
      
		<ul class="bunnylist nav nav-tabs" id="myTab-partner" role="tablist">
			<?php
				if( have_rows('partner_services') ) : $i = 1;
					while( have_rows('partner_services') ) : the_row();
			?>
						<li class="nav-item" role="presentation">
						  <div class="bunnybox">
							<small>0<?php echo esc_html( $i ); ?>.</small>
							<h3><?php echo esc_html( get_sub_field('title') ); ?></h3>
						  </div>
						  <a href="javascript:void(0);" disabled class="" id="<?php echo esc_attr( str_replace(' ', '-', strtolower( get_sub_field('title') ) ) ); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr( str_replace(' ', '-', strtolower( get_sub_field('title') ) ) ); ?>"
							role="tab" aria-controls="<?php echo esc_attr( str_replace(' ', '-', strtolower( get_sub_field('title') ) ) ); ?>" aria-selected="true">EXPLORE
							<img class="arrow-up" src="<?php echo get_template_directory_uri(); ?>/assets/images/round-arrow.svg"alt=""/>
							<img class="arrow-down" src="<?php echo get_template_directory_uri(); ?>/assets/images/round-arrow2.svg"alt=""/>
						  </a>
						</li>
			<?php
                        $i++;
					endwhile;
				endif;
			?>
      	</ul>
		<div class="tab-content" id="myTabContent-partner">
			<?php
				if( have_rows('partner_services') ) : $i = 1;
					while( have_rows('partner_services') ) : the_row();
			?>
						<div class="tab-pane fade" id="<?php echo esc_attr( str_replace(' ', '-', strtolower( get_sub_field('title') ) ) ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( str_replace(' ', '-', strtolower( get_sub_field('title') ) ) ); ?>-tab">
							<p class="dontlet">
								<?php echo esc_html( get_sub_field('description') ); ?>
							</p>
						</div>
			<?php
					endwhile;
				endif;
			?>  
			
			<div class="tab-pane fade show active" id="default" role="tabpanel" aria-labelledby="default-tab">
      			<p class="dontlet"><?php the_field('p_description'); ?></p>
			</div>
			
		</div>
    </div>
  </section>

  <section class="section_3 py-5" id="workflow">
    <div class="container">
      <div class="row">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
          <div class="personalray">
            <h2 class="text-uppercase"><?php echo nl2br( get_field('prtnr_title') ); ?></h2>
            <p><?php the_field('prtnr_description'); ?>
            </p>
          </div>
        </div>
      </div>
      <ul class="nav nav-tabs d-block" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link text-uppercase active" id="concept-tab" data-bs-toggle="tab" data-bs-target="#concept" type="button"
            role="tab" aria-controls="home" aria-selected="true">
            <small>01.</small>
            <?php echo esc_html( get_field('prtnr_process_1_title') ); ?></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-uppercase" id="budget-tab" data-bs-toggle="tab" data-bs-target="#budget" type="button"
            role="tab" aria-controls="profile" aria-selected="false">
            <small>02.</small>
            <?php echo esc_html( get_field('prtnr_process_2_title') ); ?></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-uppercase" id="development-tab" data-bs-toggle="tab" data-bs-target="#development" type="button"
            role="tab" aria-controls="contact" aria-selected="false">
            <small>03.</small>
            <?php echo esc_html( get_field('prtnr_process_3_title') ); ?></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-uppercase" id="result-tab" data-bs-toggle="tab" data-bs-target="#result" type="button"
            role="tab" aria-controls="contact" aria-selected="false">
            <small>04.</small>
            <?php echo esc_html( get_field('prtnr_process_4_title') ); ?></button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="concept" role="tabpanel" aria-labelledby="concept-tab">
          <div class="tabbox">
            <div class="number">
              01.
            </div>
            <div class="text">
              <h4 class="text-uppercase"><?php echo esc_html( get_field('prtnr_process_1_title') ); ?></h4>
              <p><?php echo esc_html( get_field('prtnr_process_1_description') ); ?></p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="budget" role="tabpanel" aria-labelledby="budget-tab">
          <div class="tabbox">
            <div class="number">
              02.
            </div>
            <div class="text">
              <h4 class="text-uppercase"><?php echo esc_html( get_field('prtnr_process_2_title') ); ?></h4>
              <p><?php echo esc_html( get_field('prtnr_process_2_description') ); ?></p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="development" role="tabpanel" aria-labelledby="development-tab">
          <div class="tabbox">
            <div class="number">
              03.
            </div>
            <div class="text">
              <h4 class="text-uppercase"><?php echo esc_html( get_field('prtnr_process_3_title') ); ?></h4>
              <p><?php echo esc_html( get_field('prtnr_process_3_description') ); ?></p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="result" role="tabpanel" aria-labelledby="result-tab">
          <div class="tabbox">
            <div class="number">
              04.
            </div>
            <div class="text">
              <h4 class="text-uppercase"><?php echo esc_html( get_field('prtnr_process_4_title') ); ?></h4>
              <p>
                <?php echo esc_html( get_field('prtnr_process_4_description') ); ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="section_4 py-5">
    <div class="row align-items-center h-100 border border-2">
      <div class="slider">
        <div class="logos">
        <?php
            if( have_rows('partner_logos') ) :
                while( have_rows('partner_logos') ) : the_row();
                    if( isset( $_GET['theme_style'] ) == 'dark' ) {
                      echo wp_get_attachment_image( 
                        get_sub_field('image_dark'), 
                        'thumbnail',
                        "",
                        array( "class" => "img-fluid" ) ); 
                    } 
                    else {
                      echo wp_get_attachment_image( 
                        get_sub_field('image'), 
                        'thumbnail',
                        "",
                        array( "class" => "img-fluid" ) ); 
                    }
                endwhile;
            endif;
        ?>
        </div>
        <div class="logos">
            <?php
                if( have_rows('partner_logos') ) :
                    while( have_rows('partner_logos') ) : the_row();
                      if( isset( $_GET['theme_style'] ) == 'dark' ) {
                        echo wp_get_attachment_image( 
                          get_sub_field('image_dark'), 
                          'thumbnail',
                          "",
                          array( "class" => "img-fluid" ) ); 
                      } 
                      else {
                        echo wp_get_attachment_image( 
                          get_sub_field('image'), 
                          'thumbnail',
                          "",
                          array( "class" => "img-fluid" ) ); 
                      }
                    endwhile;
                endif;
            ?>
        </div>
      </div>
    </div>
  </section>


  <section class="section_5 py-5">
    <div class="container">
      <div class="counter">
        <div class="row">
        <?php
            if( have_rows('stats') ) :
                while( have_rows('stats') ) : the_row();
        ?>
                    <div class="col-md-3">
                        <div class="countbox">
                        <span><?php echo esc_html( get_sub_field('title') ); ?></span>
                        <p><?php echo esc_html( get_sub_field('description') ); ?></p>
                        </div>
                    </div>
        <?php
                endwhile;
            endif;
        ?>
        </div>
      </div>
    </div>
  </section>


  <section class="section_6 py-5">
    <div class="container">
      <h2 class="text-uppercase"><?php echo nl2br( get_field('testimonials_heading') ); ?></h2>

      <div class="owl-slider">
        <div id="carousel" class="owl-carousel">
        <?php
            if( have_rows('testimonials') ) :
                while( have_rows('testimonials') ) : the_row();
        ?>
                    <div class="item">
                        <p><?php echo esc_html( get_sub_field('review') ); ?></p>
                        <div class="testi_name">
                        <h6 class="text-uppercase"> - <?php echo esc_html( get_sub_field('name') ); ?></h6>
                        <small><?php echo esc_html( get_sub_field('company_name') ); ?></small>
                        </div>
                    </div>
        <?php
                endwhile;
            endif;
        ?>
        </div>
      </div>
    </div>
  </section>

<?php

get_footer();
