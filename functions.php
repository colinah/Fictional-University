<?php

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
      'compare' =>  '<=',
      'value' => date("Ymd"),
      'type' => 'numeric'
    )));
  }
}

add_action('pre_get_posts','university_adjust_queries');