<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<!-- ie8 = ie7 -->
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon"/>
    
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php
    wp_get_archives('type=monthly&format=link');
    wp_head();
  ?>
</head>

<body>

<!-- container -->
<div id="all">

	<!-- site 790 px centralizado -->
    <div id="site">
    
        <!-- header do template -->
        <div id="header">
    	
        	<!-- logomarca do site -->
        	<div id="logo">
            <a href="index.php"><img src="<?php bloginfo('template_directory'); ?>/images/logo.gif" alt="Manubia" /></a>
            </div>
            
            <!-- coluna 2 do header -->
            <div class="coluna">
            
            	<!-- formulário de login-->
                <div id="formlogin">
                    <p>N&atilde;o sou cadastrado mas quero <a href="/manubia/pub/index">Me Cadastrar</a><br />

                    <form action="/manubia/authentication/login" method="post">
                    <label>Login: </label> <input type="text" name="login" value="" id="login" size="12"/>
                    <label>Senha: </label><input name="password" value="" type="password" size="12"/>
                    <input class="botao" name="ok" type="submit" value="Ok" />
                    <input type="hidden" name="success_controller" value="painel" id="success_controller" /><input type="hidden" name="success_action" value="index" id="success_action" /><input type="hidden" name="error_controller" value="pub" id="error_controller" /><input type="hidden" name="error_action" value="index" id="error_action" />
                    </form></p>
                
                <!-- fim formulário de login-->
                </div>
            	
                <!-- menu principal -->
                <div id="menu">
                	
                    <ul>
                    <?php 
					$menu = new stickymenu;
					$menu->display_menu('menu=principal'); 
					?>
                    </ul>
                    
                <!-- fim menu principal -->  
                </div>
            
            <!-- fim coluna 2 do header -->
            </div>
        
        <!-- fim header -->
        </div>
