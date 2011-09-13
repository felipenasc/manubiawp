

	<!-- busca no blog -->
    
      <h5 style="padding-left:20px;">Pesquisa no blog</h5>

      <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
	    <div style="padding-left: 8px;">
		    <input type="text" name="s" id="s" size="20" />
		    <input type="submit" value=">>" class="botao" />
	    </div>
	    </form>
    <!-- fim busca -->
    
	<?php
	  /**
	  * only shown if widget sidebar not enabled
	  */
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :
		
    ?>
    
	

   
<?php endif; ?>

