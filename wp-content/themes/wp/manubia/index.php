<?php

  get_header();

  if (have_posts()): ?>

  	<ol id="posts"><?php

    while (have_posts()) : the_post(); ?>
    
    <!-- miolo/conteúdo -->
    <div id="content">
    
    <div id="pagpost">
        
    <!-- mostra o conteúdo se houver -->

    <li id="post-<?php the_ID(); ?>" style="margin-left:0">

      <h3><?php the_title(); ?></h3>
      <p align="right" style="margin-right:20px;"><?php the_date(); ?> | <a href="<?php the_permalink() ?>" rel="bookmark">Link Permanente</a></p>

      <!-- conteudo -->
      <div class="post">
	  <?php the_content(__('(more...)')); ?>
      
      <p class="tags"><br />
	  <?php the_tags(__('Tags: '), '') . edit_post_link(__('Edit'), ''); ?></p>
      
      </div>
             
    </li>
    
    <!-- fim pagpost  -->
    </div>
    
    
    <!-- sidebar WP -->
    <div id="sidebar">
	<?php get_sidebar(); ?>
    <!-- fim sidebar WP -->
    </div>
    
    <!-- fim miolo/conteúdo -->
    </div>
    

    <?php comments_template(); // Get wp-comments.php template ?>

    <?php endwhile; ?>

  </ol>

<?php else: ?>

  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php

  endif;
  ?>

  <?php if (will_paginate()): ?>
  
    <ul id="pagination">
      <li class="previous"><?php posts_nav_link('','','&laquo; Previous Entries') ?></li>
      <li class="future"><?php posts_nav_link('','Next Entries &raquo;','') ?></li>
    </ul>
    
  <?php endif; ?>


<?php
  get_footer();
?>