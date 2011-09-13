<?php
/*
Plugin Name: Sticky Menu
Plugin URI: http://tela-web.com/wordpress-plugins/sticky-menu/
Description: Easily create menus that link to internal content or external urls. Admin under <a href="edit.php?page=stickymenu/admin.php"> Manage | Sticky Menus</a>.
Version: 1.3
Author: ericdes
Author URI: http://tela-web.com
*/
/*  Copyright 2006-2007  Eric Desgranges  (email : eric@vcardprocessor.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
/* Put in template files add the following code where you want the menu to appear:
	<?php
	$current_plugins = get_option('active_plugins'); 
	if (in_array('stickymenu/stickymenu.php', $current_plugins)) { 
       	$menu = new stickymenu;
		$menu->display_menu('menu=main');
	};	
	?>
*/
$development = FALSE;
$version = '1.3';

load_plugin_textdomain('stickymenu', 'wp-content/plugins/stickymenu');

if (isset($_GET['activate']) && $_GET['activate'] == 'true') {
  add_action('init', 'stickymenu_install');
};
add_action('admin_menu', array('stickymenu'.$dir, 'adminpage'));


####################################
class stickymenu {
####################################

function adminpage() {
if( function_exists('add_options_page')) {
  add_management_page('Sticky Menu', 'Sticky Menus', 7, 'stickymenu'.$dir.'/admin.php');
};  
return;
}

function display_menu($args = '') {
# Take for argument: 'menu=main' if you want to display menu 'main'
global $table_prefix, $wpdb;

  parse_str($args, $r);
  if (!isset($r['menu'])) {
    $r['menu'] = 'main';	
  };
  
  // Query database
  $sql = "SELECT * FROM `".$table_prefix."stickymenu`"
       . " WHERE `menu` = '".$r['menu']."' AND `disabled` <> 1"
	     . " ORDER BY `weight` ASC";
  $menu_items = $wpdb->get_results($sql, ARRAY_A);
  if ($menu_items) {
    foreach($menu_items as $item) {
	  $output .= '<li' . (($item['class'])? ' class="'.$item['class'].'"' : '') . '><a href="'.$item['link'].'" title="'.$item['name'].'">'.$item['name'].'</a></li>'."\n";
    };
  };  
  echo $output;
  return;
}

####################################
}
####################################

# ----------------------------------
function stickymenu_install() {
# ----------------------------------
global $wpdb, $user_level, $version;

get_currentuserinfo();

if ($user_level < 8) {
  return;
};
$table_name = $wpdb->prefix . 'stickymenu';

if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
  # Create DB table
  $sql = "CREATE TABLE $table_name ("
     ." id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,"
	   ." name VARCHAR(55) NOT NULL,"
	   ." link VARCHAR(255) NOT NULL,"
	   ." menu VARCHAR(55) NOT NULL,"
	   ." class VARCHAR(55) NOT NULL,"
	   ." weight int(11) NOT NULL DEFAULT '0',"
	   ." disabled TINYINT NOT NULL DEFAULT '0',"
	   ." UNIQUE KEY id (id)"
	   ." ) TYPE = MYISAM;";
  require_once(ABSPATH.'wp-admin/upgrade-functions.php');
  dbDelta($sql);
  
} else if ($wpdb->get_var("show columns from $table_name like 'class'") != 'class') {
	# This column 'class' was added in release 1.2 || 1.3
	$column_name = 'class';
	$sql = "ALTER TABLE $table_name ADD $column_name VARCHAR(55) NOT NULL";
  $wpdb->query($sql);
  require_once(ABSPATH.'wp-admin/upgrade-functions.php');
};	 

$installed_version = get_option( "stickymenu_version" );
if ($installed_version) {
  update_option("stickymenu_version", $version);
} else {
  update_option("stickymenu_version", $version);
};  


}


?>
