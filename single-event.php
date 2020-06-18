<?php
get_header();

    the_post();
    pageBanner();?>
  </div>
 

  <div class="container container--narrow page-section">
  <h1>Single EVENT</h1>
    <div class="generic-content">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
              <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>">
                <i class="fa fa-home" aria-hidden="true">
                </i> Events Home
              </a>
              <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div class="generic-content"><?php the_content(); ?>
    </div>
    <hr class ="section-break">
    <?php 
      $relatedPrograms = get_field('related_programs');
      if($relatedPrograms) {
        echo '<h2 class="headline headline--medium">Related Programs</h2>';
        echo '<ul class="link-list min-list">';
        foreach($relatedPrograms as $program) {
        ?>
        <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program)?></a></li>
        <?php
        }
        echo '</ul>';
    }
      ?>
  </div>


<?php
get_footer();
    ?>