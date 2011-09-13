<?php

  get_header();
?>

<table cellspacing="0" cellpadding="0" border="0">
<tr>
    <td valign="top" style="width:550px;">
		<?php  if (have_posts()): ?>

	  	<ol id="posts"><?php
	
	    while (have_posts()) : the_post(); ?>
	    
	    <!-- miolo/conte?do -->
	    <div class="content" style="width:550px;">
	    
	    <div class="pagpost">
		    <!-- mostra o conteudo se houver -->
			<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Link Permanente"><?php the_title(); ?></a></h1>
			<p style="color:#999;font-size:0.95em;"> Escrito em <?php the_date(); ?></p>
	
	      	<!-- conteudo -->
	      	<div class="post">
			  	<?php the_excerpt() ?>
			  	<a style="color:#f93;" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">Continue lendo &quot; <?php the_title(); ?> &quot;</a>
			  	<br />
		      	<p class="tags" style="border-bottom: 1px solid #e5e5e5;padding-bottom: 30px;"><?php the_tags(__('Tags: '), '') . edit_post_link(__('Edit'), ''); ?>  <?php comments_popup_link(__('Sem coment&aacute;rios &#187;', ''), __('1 Coment&aacute;rio &#187;', 'manubia'), __('% Coment&aacute;rios &#187;', 'manubia'), '', __('Coment&aacute;rios Fechados', 'manubia') ); ?></p>
	      	</div>
	    <!-- fim pagpost  -->
	    </div>
	    
	    
	    <!-- fim miolo/conte?do -->
	    </div>
	    
	
	    <?php comments_template(); // Get wp-comments.php template ?>
	
	    <?php endwhile; ?>
	
	  </ol>
	
	<?php else: ?>
	
	  <p><?php _e('Nenhum post foi encontrado com esses crit&eacute;rios de busca.'); ?></p>
	
	<?php
	
	  endif;
	  ?>
	

	</td>
    <td rowspan="2"  valign="top">
	  <!-- sidebar WP -->
    <div id="sidebar">
	<?php get_sidebar(); ?>
    <!-- fim sidebar WP -->
    </div>
	  
	</td>
</tr>
<tr>
    <td valign="top">
	<?php if (will_paginate()): ?>
	    <ul id="pagination">
	      <li class="previous"><?php posts_nav_link('','','&laquo; Textos anteriores') ?></li>
	      <li class="future"><?php posts_nav_link('','Pr&oacute;ximos textos &raquo;','') ?></li>
	    </ul>
	  <?php endif; ?>		
	</td>
</tr>
</table>

<?php
  get_footer();
?>