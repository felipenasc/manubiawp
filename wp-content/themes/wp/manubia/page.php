<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>
	
    <!-- miolo/conteúdo -->
    <div id="content">
        
    <!-- mostra o conteúdo se houver -->
    <div id="post-<?php the_ID(); ?>">

      <!-- título do post ou página -->
      <h3><?php the_title(); ?></h3>
      
      <!-- conteudo -->
      <div class="post">
	  
	  	<?php the_content(__('(more...)')); ?>
      	
        <p>
      <!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pub=xa-4aa400ec4b36412e"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4aa400ec4b36412e"></script>
<!-- AddThis Button END -->
      </p>
      </div>
      
    <!-- fim do conteúdo -->
    </div>

	<!-- fim miolo/conteúdo -->
    </div>

	

  <?php
  comments_template();

  endwhile; else: ?>


<?php
  endif;

  get_footer();
?>