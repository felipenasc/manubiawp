==== Sticky Menu 1.2 ====

Tags: menu
Contributor: ericdes

Sticky Menu allows an easy creation of menu items that link to internal content or external urls.

Installation: 
- Put folder stickymeny in directory /wp-content/plugins/
- Activate the plugin
- In Manager | Sticky Menu, create menu items for menus 'top', 'bottom', 'right' and/or 'left'.
- In header.php (as an example), add somewhere where you want to display a menu:
		<?php
		// Test if Sticky Menu plugin is active, then display menu items for menu 'main'
		$current_plugins = get_option('active_plugins'); 
		if (in_array('stickymenu/stickymenu.php', $current_plugins)) { 
			$menu = new stickymenu;
			$menu->display_menu('menu=main'); # To display menu 'main'
		};	
		?>
		
		

