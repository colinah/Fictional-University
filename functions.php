<?php
function pageBanner($args = NULL){
  //Setting up args for missing inputs
  if(!$args['title']) $args['title'] = get_the_title();
  if(!$args['subtitle']) $args['subtitle'] = get_field('page_banner_subtitle');
  if(!$args['photo']) {
    if(get_field('page_banner_background_image')) {
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } else {
      $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
    }
  }
  //Setting up page banner image
  $pageBannerImage = get_field('page_banner_background_image'); 
  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo'] ?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo $args['title'] ;?></h1>
        <div class="page-banner__intro">
          <p><?php echo $args['subtitle']; ?></p>
      </div>
    </div>  
  </div>
  <?php
}

function university_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('orderby','title');
    $query->set('order', 'ASC');
    $query->set('post_per_page', -1);

  }

  $today = date('Ymd');
  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
  $query->set('meta_key', 'event_date');
  $query->set('orderby', 'meta_value_num');
  $query->set('order', 'ASC');
  $query->set('meta_query', array(
      array(
      'key' => 'event_date',
      'compare' =>  '>=',
      'value' => date("Ymd"),
      'type' => 'numeric'
    )));
  }
}

add_action('pre_get_posts','university_adjust_queries');