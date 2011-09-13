<?php
/*
Template Name: Homepage
*/
?>

<?php
  get_header();
?>
	
    <!-- miolo/conteúdo -->
    <div id="content">
        
    <!-- mostra o conteúdo se houver -->
    <div>

      <!-- título do post ou página -->
      <h3>Controle financeiro pessoal de forma f&aacute;cil, r&aacute;pida e intuitiva</h3>
      
      <!-- conteudo -->
      <div class="post">
	  
	  	<?php $Gallery -> slideshow(); ?>
      
      </div>
      
    <!-- fim do conteúdo -->
    </div>
	
    <!-- LINHA 2: POSTS DA CATEGORIA DESTAQUE LINHA -->  
    <div class="linha2">
		  <?php query_posts('cat=33&showposts=3'); ?>  
          <?php while (have_posts()) : the_post(); ?>
          
          <?php //get estilo (custom field) ?>
		  <?php $estilo = get_post_meta($post->ID, 'estilo', true); ?>

          
          <div class="<?php echo $estilo; ?>"><?php the_content(__('(more...)')); ?></div>
          <?php endwhile;?>
        
	<div class="clear">&nbsp;</div>
    </div>
    <!-- fim LINHA 2 -->
    
    
    <!-- LINHA 3: Segurança e Twitter -->
    <div class="linha3">
    
        <div class="coluna1">
        
          <?php query_posts('cat=34&showposts=1'); ?>  
          <?php while (have_posts()) : the_post(); ?>
          	<div>
                <h4><?php the_title(); ?></h4>
                <?php the_content(__('(more...)')); ?>
            </div>
          <?php endwhile;?>
        
        </div>
        
        <div id="twtr-profile-widget" class="coluna2"></div>
                    
            <script src="http://widgets.twimg.com/j/1/widget.js"></script>
            <link href="http://widgets.twimg.com/j/1/widget.css" type="text/css" rel="stylesheet">
            <script>
            new TWTR.Widget({
              profile: true,
              id: 'twtr-profile-widget',
              loop: false,
              width: 250,
              height: 150,
              theme: {
                shell: {
                  background: '#ffffff',
                  color: '#ffffff'
                },
                tweets: {
                  background: '#ffffff',
                  color: '#444444',
                  links: '#1985b5'
                }
              }
            }).render().setProfile('Manubia_oficial').start();
            </script>
            
        
    </div>
    <!-- fim LINHA 3-->
    
	<!-- fim miolo/conteúdo -->
    </div>

<?php
  get_footer();
?>