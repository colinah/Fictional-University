<?php
get_header();

    the_post(); ?>
    <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg')?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title()?></h1>
      <div class="page-banner__intro">
        <p>Replace me!</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">
    
    <div class="generic-content">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
              <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>">
                <i class="fa fa-home" aria-hidden="true">
                </i> All Programs
              </a>
              <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div class="generic-content">
        <?php the_content(); ?>
    </div>
    Hellow
  </div>


<?php
get_footer();
    ?>