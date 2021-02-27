<?php get_header(); ?>
<section class="bg-light p-b-0 home-slider">

    <!-- Wrapper For Slides -->


    <?php
    // Get the Video Fields
    $video_mp4 =  get_field('mp4_file'); // MP4 Field Name
    $video_poster  = get_field('obrazok_video'); // Poster Image Field Name
    ?>
    <div class="bg-video-wrapper">
        <div class="bg-video">
            <video class="bg-video__content" autoplay muted loop>
                <source src="<?php echo $video_mp4; ?>" type="video/mp4" />

                Your browser is not supported!
            </video>
        </div>

        <!-- Slide Text Layer -->
        <div class="container align-vertical">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-6 align-self-center">
                    <h1 class="title text-white"><?php the_field('nadpis_na_hlavnom_silderi'); ?></h1>
                    <a class="cx btn btn-green-gradiant btn-rounded btn-md btn-arrow m-t-20 m-b-40" href="<?php the_field('odkaz'); ?>"><span><?php the_field('tlacidlo_slider'); ?><i class="ti-arrow-right"></i></span></a>

                </div>
                <div class="col-lg-6 col-md-6  col-xs-6 align-self-center text-center">
                    <img src="https://new.nuttery.sk/wp-content/themes/nuttery/seduco-core/img/basket.svg" alt="" srcset="">
                    <span class="title text-white">pozri video</span>
                </div>
            </div>
        </div>
    </div>


</section>
<section>
    <div id='hero-mobile'></div>
</section>
<section>
    <div class="spacer feature12" style="padding-bottom: 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-r-40">
                    <?php the_field('#1_sekcia'); ?>
                    <div class="row">
                        <?php the_field('#1_sekcia_info'); ?>
                        <div class="col-lg-12 m-t-30 m-b-30">
                            <a class="btn btn-green-gradiant btn-rounded btn-md btn-arrow" href="<?php the_field('#1_sekcia_url'); ?>"><span><?php the_field('#1_sekcia_tlacidlo'); ?> <i class="ti-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row wrap-feature-12">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12"><img src="<?php echo get_template_directory_uri(); ?>/images/homepage/Nuttery-home01.jpg" class="rounded img-shadow img-responsive" alt="milk" data-aos="fade-up" /></div>
                                <div class="col-md-12"><img src="<?php echo get_template_directory_uri(); ?>/images/homepage/Nuttery-home02.jpg" class="rounded img-shadow img-responsive" alt="milk" data-aos="fade-up" /></div>
                            </div>
                        </div>
                        <div class="col-md-6 uneven-box">
                            <div class="row">
                                <div class="col-md-12"><img src="<?php echo get_template_directory_uri(); ?>/images/homepage/Nuttery-home03.jpg" class="rounded img-shadow img-responsive" alt="nuttery" data-aos="fade-up" data-aos-duration="600" /></div>
                                <div class="col-md-12"><img src="<?php echo get_template_directory_uri(); ?>/images/homepage/Nuttery-home04.jpg" class="rounded img-shadow img-responsive" alt="nuttery" data-aos="fade-up" data-aos-duration="600" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="spacer feature47">
        <div class="container">
            <div class="row wrap-feature47-box">
                <div class="col-md-6 align-self-center">
                    <div class="m-auto">
                        <?php the_field('#2_sekcia'); ?>
                        <ul class="list-block with-underline font-medium m-t-30 m-b-20 text-dark">
                            <?php if (have_rows('#2_sekcia_odrazky')) : ?>
                                <?php while (have_rows('#2_sekcia_odrazky')) : the_row(); ?>
                                    <li><i class="sl-icon-check text-success"></i> <span><?php the_sub_field('vlastnost'); ?> </span></li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                        <a class="btn btn-green-gradiant btn-md btn-rounded btn-arrow m-t-20 m-b-20" href="<?php the_field('#2_sekcia_tlacidlo_url'); ?>"><span><?php the_field('#2_sekcia_tlacidlo'); ?> <i class="ti-arrow-right"></i></span></a>
                    </div>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="card" div data-aos="zoom-in" data-aos-duration="1200">
                        <img class="card-img-top p-t-80" src="<?php echo get_template_directory_uri(); ?>/images/features/feature47/Nuttery-index-left.png" alt="Nuttery-index-left">
                        <!--<div class="card-body">
                          <div class="p-20">
                              <h3 class="font-light f-47-line">Lorem Ipsum is simply dummying of the printing and type setting industry. Lorem Ipsum has been</h3>
                          </div>
                      </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="spacer bg-light c2a1" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/Nuttery_homepage-bottomB.jpg)">
        <div class="container">
            <!-- Row -->
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <?php the_field('cta'); ?>
                    <a class="btn btn-red-gradiant btn-md btn-rounded btn-arrow m-t-20 text-uppercase" href="<?php the_field('cta_tlacidlo_odkaz'); ?>"><span><?php the_field('cta_tlacidlo_text'); ?><i class="ti-arrow-right"></i></span></a>
                </div>
            </div>
            <!-- Row -->
        </div>
    </div>
</section>
<section>
    <div class="blog-home1 spacer bg-light">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center">
                <!-- Column -->
                <div class="col-md-8 text-center">
                    <?php the_field('posledne_clanky'); ?>
                </div>
                <!-- Column -->
                <!-- Column -->
            </div>
            <div class="row m-t-40">
                <?php
                $args = array('post_type' => 'post', 'posts_per_page' => 3);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                ?>
                    <!-- Column -->
                    <div class="col-md-4">
                        <div class="card card-shadow" data-aos="flip-left" data-aos-duration="1200">
                            <a href="<?php the_permalink(); ?>"><img class="card-img-top" src="<?php the_post_thumbnail_url('mdblog'); ?>" alt="blog-nuttery"></a>
                            <div class="p-30">
                                <div class="d-flex no-block font-14">
                                    <a style="pointer-events: none;" href="<?php the_permalink(); ?>">NUTTERY</a>
                                    <span class="ml-auto"><?php echo get_the_date(); ?></span>
                                </div>
                                <h5 class="font-medium m-t-20"><a href="<?php the_permalink(); ?>" class="link"><?php the_title(); ?></a></h5>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="form6 spacer">
        <!-- Row  -->
        <div class="row">
            <div class="container">
                <div class="col-lg-6 align-justify-center p-r-40 p-l-0 contact-form">
                    <div class="" data-aos="fade-right" data-aos-duration="1200">
                        <?php the_field('kontakt_-_text'); ?>
                        <?php echo do_shortcode('[contact-form-7 id="127" title="Domov formulár"]'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 right-image" style="background-image:url(<?php $attachment_id = get_field('kontakt_-_obrazok');
                                                                            $size = "lgblog";
                                                                            $image = wp_get_attachment_image_src($attachment_id, $size);
                                                                            echo $image[0];
                                                                            ?>  );">
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>