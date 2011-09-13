

	<!-- busca no blog -->
	
	<table cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td colspan="2" height="55px">
				<iframe src="http://www.facebook.com/plugins/like.php?app_id=207700502614747&amp;href=http%3A%2F%2Fwww.facebook.com%2FManubiaFinancasPessoais&amp;send=false&amp;layout=standard&amp;width=200&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=85" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:85px;" allowTransparency="true"></iframe>
			</td>
		</tr>
		
		<tr>
			<td width="52">
				<?php printf(__("<a href='%s'><img src='/wp-content/uploads/2010/01/Feed_48x48.png' border='0' alt=''></a>", "manubia"), get_category_feed_link('31')); ?>
			</td>
			<td style="padding-left:5px;">
				<a href='http://feeds.feedburner.com/manubia'>Feed do Manubia</a>
			</td>
		<tr>
		<tr>
			<td>
				<a href="http://twitter.com/ManubiaFinancas" target="_blank"><img src='/wp-content/uploads/2010/01/Twitter_48x48.png' border='0' alt='Siga-me no twitter'></a>
			</td>
			<td style="padding-left:5px;">
				<a href="http://twitter.com/ManubiaFinancas" target="_blank"> Siga-me no Twitter</a> <br>@manubia_oficial
			</td>
		<tr>
	</table>

		
    
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

