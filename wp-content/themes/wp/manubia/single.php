<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>
	<!-- miolo/conteúdo -->
    <div id="content">
    
    <div id="pagpost">
        
    <!-- mostra o conteúdo se houver -->
    <div id="post-<?php the_ID(); ?>">

      <h3><?php the_title(); ?></h3>
      <p align="right" style="margin-right:20px;"><?php the_date(); ?> | <a href="<?php the_permalink() ?>" rel="bookmark">Link Permanente</a></p>

      <!-- conteudo -->
      <div class="post">
	  <?php the_content(__('(more...)')); ?>
      
      <p class="tags"><br />
	  <?php the_tags(__('Tags: '), '') . edit_post_link(__('Edit'), ''); ?></p>
      
      <p>
      <!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pub=xa-4aa400ec4b36412e"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4aa400ec4b36412e"></script>
<!-- AddThis Button END -->
      </p>
      
      </div>
      
            
    <!-- fim do conteúdo -->
    </div>

	<!-- fim pagpost  -->
    </div>
    
    
    <!-- sidebar WP -->
    <div id="sidebar">
	<?php get_sidebar(); ?>
    <!-- fim sidebar WP -->
    </div>
    
    <!-- fim miolo/conteúdo -->
    </div>
      
    

    
	<?php

  comments_template();

  endwhile; else: ?>

	<p>Sem resultados.</p>

<?php
  endif;

  get_footer();

?>