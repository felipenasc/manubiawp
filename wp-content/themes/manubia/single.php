<?php

  /**
  *@desc A single blog post See page.php is for a page layout.
  */

  get_header();
  ?>
  
  
  <table>
  	<tr>
		<td valign="top">
			<?php 
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				<!-- mostra o conteúdo se houver -->
			    <div id="post-<?php the_ID(); ?>">
			
			      <h1><?php the_title(); ?></h1>
				  <p style="color:#999;font-size:0.95em;"> Escrito em <?php the_date(); ?> | <a href="<?php the_permalink() ?>" rel="bookmark">Link Permanente</a></p>
			
			      <!-- conteudo -->
			      <div class="post">
				  <?php the_content(__('(more...)')); ?>
			      
			      <p class="tags"><br />
				  <?php the_tags(__('Tags: '), '') . edit_post_link(__('Edit'), ''); ?></p>
				  
				  <p class="postmetadata alt">
								<small>
									<?php printf(__("Acompanhe os coment&aacute;rios deste post pelo <a href='%s'>RSS 2.0</a> feed.", "manubia"), get_post_comments_feed_link()); ?> 
			
									<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
										// Both Comments and Pings are open ?>
										<?php printf(__('Voc&ecirc; pode <a href="#respond">deixar um coment&aacute;rio</a>, ou um <a href="%s" rel="trackback">trackback</a> do seu site.', 'manubia'), trackback_url(false)); ?>
			
									<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
										// Only Pings are Open ?>
										<?php printf(__('Os coment&aacute;rios est&atilde;o desativados no momento, mas voc&ecirc; pode deixar um <a href="%s" rel="trackback">trackback</a> do seu site.', 'manubia'), trackback_url(false)); ?>
			
									<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
										// Comments are open, Pings are not ?>
										<?php _e('Voc&ecirc; pode ir para o final e deixar um coment&aacute;rio. Pinging no momento n&atilde;o &eacute; permitido.', 'manubia'); ?>
			
									<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
										// Neither Comments, nor Pings are open ?>
										<?php _e('Coment&aacute;rios e pings est&atilde;o desativados no momento.', 'manubia'); ?>
			
									<?php } edit_post_link(__('Alterar', 'manubia'),'','.'); ?>
			
								</small>
							</p>
			      
			      <p style="height:30px;">&nbsp;</p>
			      
			      </div>
			      
			            
			    <!-- fim do conteúdo -->
			    </div>
				
				<?php
		 		comments_template();
		  	endwhile; else: ?>
		
				<p>Sem resultados.</p>
		
				<?php
			endif;
			?>
		</td>
		<td valign="top">
			<!-- sidebar WP -->
		    <div id="sidebar">
			<?php get_sidebar(); ?>
		    <!-- fim sidebar WP -->
		    </div>
		</td>
	</tr>
</table>
      
    

    
	
      <p>
      <!-- AddThis Button BEGIN -->
<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pub=xa-4aa400ec4b36412e"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4aa400ec4b36412e"></script>
<!-- AddThis Button END -->
      </p>

<?php
  get_footer();

?>