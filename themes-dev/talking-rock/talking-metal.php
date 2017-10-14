
<?php
//Template Name: Talking Metal
get_header();
?>
	
<div class='talking-metal'>
  <h1>Talking Metal</h1>  
  <?php $catquery = new WP_Query('cat=8&posts_per_page=100'); ?>
  <ul>
  
  <?php while ($catquery->have_posts()) : $catquery->the_post(); ?>
  
  <li>
    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('large'); ?> " alt="<?php the_title(); ?>"></a>
    <div class="date">Date: <?php the_date(); ?></div>
    <div class='author'>Written By: <?php the_author(); ?></div>
    <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
    <p><?php the_excerpt(); ?></p>
  </li>
  <?php endwhile;
  wp_reset_postdata();
  ?>
  </ul>
<?php
get_footer();
?>