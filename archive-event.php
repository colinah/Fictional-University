<?php 
get_header();
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'A list of our upcoming events'
));
?>

<div class="container container--narrow page-section">

<?php 
    while(have_posts()) {
      the_post();
      get_template_part('template-parts/event');
    }
    echo paginate_links();
?>
<p>See our past events <a href="<?php echo site_url('/past-events')?>">HERE</a>.</p>
</div>

<?php
get_footer();
?>