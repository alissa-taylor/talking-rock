
<?php
//Template Name: Homepage
get_header();
?>
	
<div class='homepage'>
  <div class="swiper">
    <div class='swiper-container'>
      <div class='swiper-wrapper'>
      <?php 
      $posts = get_field('post_name');
      if ($posts) : ?>
        <?php foreach ($posts as $post) : // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
          <div class="swiper-slide">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php the_post_thumbnail_url('large'); ?>" alt="">
              <p><?php the_title(); ?></p>
            </a>
          </div>
          <?php endforeach; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
    <?php endif; ?>  
    <h1>Latest News</h1> 
    <?php $postslist = get_posts(array(
      'posts_per_page' => 3,
      'order' => 'ASC',
      'orderby' => 'title'
    ));
    ?>
    <?php if ($postslist) {
      foreach ($postslist as $post) :
        setup_postdata($post);
      ?>
      <div class="latestPost">
        <div class="featured-image">
          <img src="<?php the_post_thumbnail_url('medium'); ?> " alt="">
          <div class="date"><?php the_date('M d'); ?></div>
        </div>
        <div class="postInfo">
          <div class="date">Date: <?php echo get_the_date(); ?></div>
          <div class="category">Posted in: <?php the_category(' '); ?></div>          
          <h3><?php the_title(); ?></h3>
          <p><?php the_excerpt(); ?></p>
          <div class='ctaBtn'><a href="<?php echo get_permalink(); ?>">Read More</a></div>
        </div>
      </div>
      <?php
      endforeach;
      wp_reset_postdata();
    } ?>
    <div class='moreNews'><a href="<?php echo get_permalink(); ?>">More News</a></div>
</div>

<script>
   $(document).ready(function(){
     var swiper = new Swiper('.swiper-container', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 30,
        loop: true
    });
  });
    </script>
    <?php
    get_footer();
    ?>