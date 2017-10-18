
<?php
//Template Name: Videos Page
get_header();
?>
	
<h1 class="header">Videos</h1>  
<div class='category videos'>
  <?php $catquery = new WP_Query('cat=11&posts_per_page=100'); ?>
  <ul>
  
  <?php while ($catquery->have_posts()) : $catquery->the_post(); ?>
  
  <li>
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