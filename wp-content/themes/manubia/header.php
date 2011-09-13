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
<div style="display:none;">






<a href='http://blogblogs.com.br/api/claim/759862972/239518/185835' rel='me'> BlogBlogs.Com.Br </a>






</div>

<!-- container -->
<div id="all">

	<!-- site 790 px centralizado -->
    <div id="site">
    
        <!-- header do template -->
        <div id="header">
        
        
        	<table cellpadding="0" cellspacing="0" border="0">
				<tr>
				    <td rowspan="3" valign="top" id="logo">
				    	<a href="/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.gif" alt="Manubia" /></a>
				    </td>
				    <td id="formloginLinks">
				    	<a href="/manubia/pub/index">Quero Me Cadastrar</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="/manubia/pub/esqueceuSenha">Esqueci Minha Senha</a>
				    </td>
				</tr>
				<tr>
				    <td  id="formlogin">
				    	<form action="https://www.manubia.com.br/manubia/authentication/login" method="post">
	                    <label>Login: </label> <input type="text" name="login" value="" id="login" size="12"/>
	                    <label>Senha: </label><input name="password" value="" type="password" size="12"/>
	                    <input class="botao" name="ok" type="submit" value="Ok" />
	                    <input type="hidden" name="success_controller" value="painel" id="success_controller" /><input type="hidden" name="success_action" value="index" id="success_action" /><input type="hidden" name="error_controller" value="pub" id="error_controller" /><input type="hidden" name="error_action" value="index" id="error_action" />
	                    </form>
				    </td>
				</tr>
				<tr>
				    <td style="padding: 12px 6px 0 0;">
				    	<div id="menu">
                			<ul>
			                    <?php 
								$menu = new stickymenu;
								$menu->display_menu('menu=principal'); 
								?>
							</ul>
			                <!-- fim menu principal -->  
		                </div>
				    </td>
				</tr>
			</table>
        
    	
        	
        
        <!-- fim header -->
        </div>
