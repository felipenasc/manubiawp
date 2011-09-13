<?php

  /**
  *@desc A page. See single.php is for a blog post layout.
  */

  get_header();

  if (have_posts()) : while (have_posts()) : the_post();
  ?>
	
    <!-- miolo/conte�do -->
    <div id="content">
        
    <!-- mostra o conte�do se houver -->
    <div id="post-<?php the_ID(); ?>">

      <!-- t�tulo do post ou p�gina -->
      <h3><?php the_title(); ?></h3>
      
      <!-- conteudo -->
      <div class="post">
	  
	  	<?php the_content(__('(more...)')); ?>
      	
      	<div class="clear">&nbsp;</div>
      	<table width="100%" border="0">
      		<tr>
      			<td align="center">
      				<!-- AddThis Button BEGIN -->
					<a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;pub=xa-4aa400ec4b36412e"><img src="https://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4aa400ec4b36412e"></script>
					<!-- AddThis Button END -->
      			</td>
      			<td align="center">
      				<div id="thawteseal" style="text-align:center;" title="Click to Verify - This site chose Thawte SSL for secure e-commerce and confidential communications.">
					<div><script type="text/javascript" src="https://seal.thawte.com/getthawteseal?host_name=www.manubia.com.br&amp;size=S&amp;lang=br"></script></div>
				</div>
			</td>
      		</tr>
      	</table>
      </div>
      
    <!-- fim do conte�do -->
    </div>

	<!-- fim miolo/conte�do -->
    </div>

	

  <?php
  

  endwhile; else: ?>


<?php
  endif;

  get_footer();
?>
