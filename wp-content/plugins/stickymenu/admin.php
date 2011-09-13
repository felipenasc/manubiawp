<div class="wrap">
<h2><?php _e('Menu Items', 'stickymenu'); ?></h2>

<?php
$display_this_error = NULL;
if (isset($_POST['enable']) || isset($_POST['disable']) || isset($_POST['delete']) || isset($_POST['edit'])) {
  if (!isset($_POST['id'])) {
    $display_this_error = "Error: You haven't selected a menu item to "
                        . ((isset($_POST['enable']))? "enable" : '')
                        . ((isset($_POST['disable']))? "disable" : '')
                        . ((isset($_POST['delete']))? "delete" : '')
                        . ((isset($_POST['edit']))? "edit" : '')
                        . ".";
    $_POST['enable']    = NULL;
    $_POST['disable']   = NULL;
    $_POST['delete']    = NULL;
    $_POST['edit']      = NULL;
  } else {  
    $ids			= $_POST['id'];
  };  
} else if (isset($_POST['add_items'])) {
  $_POST['add']		= TRUE;
  $item_count 		= ((is_numeric($_POST['item_count']))? $_POST['item_count'] : 1);
  $item_count 		= max($item_count, 1);
} else if (isset($_POST['add_items_and_menu'])) {
  $_POST['add']		= TRUE;  
  $item_count 		= ((is_numeric($_POST['item_count']))? $_POST['item_count'] : 1);
  $item_count 		= max($item_count, 1);
  if ($_POST['new_menu']) {
	$menu_to_insert	= $_POST['new_menu']; 	
    for ($i = 0; $i < $item_count; $i++) {
    	$menus[$i] 	= $menu_to_insert;
	};	
  };	
} else if (isset($_POST['update']) || isset($_POST['insert']) || isset($_POST['delete'])) {
  $ids 				= $_POST['id'];
  $names 			= $_POST['name'];
  $links 			= $_POST['link'];
  $menus 			= $_POST['menu'];
  $classes 			= $_POST['class'];
  $weights 			= $_POST['weight'];
  $enableds 		= $_POST['enabled'];
  $item_count   	= count($ids);
};
if (isset($_POST['edit'])) {
  # Retrieve selected menu items
  $sql = "SELECT * FROM `".$table_prefix."stickymenu` WHERE id IN (" . implode(', ', $ids) . ")"; 
  $items = $wpdb->get_results($sql, ARRAY_A); 
  $item_count = 0;
  foreach($items as $item) {
    $ids[$item_count]			= $item['id'];
    $names[$item_count] 		= $item['name'];
    $links[$item_count] 		= $item['link'];
    $menus[$item_count] 		= $item['menu'];
    $classes[$item_count] 		= $item['class'];
    $weights[$item_count] 		= ((is_numeric($item['weight']))? $item['weight'] : 0);
    $enableds[$item_count] 		= (($item['disabled'])? "0" : "1");
    $item_count = $item_count + 1;
  };	
};  
# Retrieve menu list
$sql = "SELECT DISTINCT menu FROM `".$table_prefix."stickymenu`"; 
$menu_list_array = $wpdb->get_results($sql, ARRAY_A); 
$menu_count = 0;
if ($menu_list_array) {
  foreach($menu_list_array as $this_menu) {
    if ($this_menu['menu']) {
      $menu_list[$menu_count] = $this_menu['menu'];
      $menu_count = $menu_count + 1;
    };
  };
};
if ($menu_to_insert) {
  $menu_list[$menu_count] = $menu_to_insert;
  $menu_count = $menu_count + 1;
};
if (!$menu_list) {
  // Don't leave empty, suggest 'main' by default
  $menu_list[$menu_count] = 'main';
  $menu_count = $menu_count + 1;
};
?>

<?php
if ($display_this_error) {
  echo "<em style=\"color: red;\">$display_this_error</em><br />\n";
} else if (isset($_POST['delete'])) {
  $sql = "DELETE FROM `".$table_prefix."stickymenu` WHERE id IN (" . implode(', ', $ids) . ")"; 
  if ($wpdb->query($sql)) {
    echo '<em>'; _e('Selected item(s) have been removed', 'stickymenu'); echo "</em><br />\n";
  };
} else if (isset($_POST['enable'])) {
  $sql = "UPDATE `".$table_prefix."stickymenu` SET `disabled` = 0 WHERE id IN (" . implode(', ', $ids) . ")"; 
  if ($wpdb->query($sql)) {
    echo '<em>'; _e('Selected item(s) have been enabled', 'stickymenu'); echo "</em><br />\n";
  };  
} else if (isset($_POST['disable'])) {
  $sql = "UPDATE `".$table_prefix."stickymenu` SET `disabled` = 1 WHERE id IN (" . implode(', ', $ids) . ")"; 
  if ($wpdb->query($sql)) {
    echo '<em>'; _e('Selected item(s) have been disabled', 'stickymenu'); echo "</em><br />\n";
  };  
} else if (isset($_POST['update'])) {
  for ($i = 0; $i < $item_count; $i++) {
    $sql = " UPDATE `".$table_prefix."stickymenu` SET"
	     . " `name` = '$names[$i]', "
	     . " `link` = '$links[$i]', "
	     . " `menu` = '$menus[$i]', "
	     . " `class` = '$classes[$i]', "
	     . " `weight` = $weights[$i], "
	     . " `disabled` = " . (($enableds[$i])? "0" : "1")
		 . " WHERE `id` = $ids[$i];";
    if ($wpdb->query($sql)) {
      echo '<em>'; _e('Menu item', 'stickymenu'); echo ' '.$names[$i].' '; _e('has been updated', 'stickymenu'); echo "</em><br />\n";
    };  
  };			 
} else if (isset($_POST['insert'])) {
  for ($i = 0; $i < $item_count; $i++) {
    $sql = " INSERT INTO `".$table_prefix."stickymenu` (`name`, `link`, `menu`, `class`, `weight`, `disabled`) VALUES("
	     . "'$names[$i]', "
	     . " '$links[$i]', "
	     . " '$menus[$i]', "
	     . " '$clases[$i]', "
	     . " $weights[$i], "
	     . (($enableds[$i])? "0" : "1")
		 . ");";
    if ($wpdb->query($sql)) {
      echo '<em>'; _e('Menu item', 'stickymenu'); echo ' '.$names[$i].' '; _e('has been added', 'stickymenu'); echo "</em><br />\n";
    };  
  };			 
};
?>


<?php if (!isset($_POST['add']) && !isset($_POST['edit'])) {
?>

<form method="post">
<h3><?php _e('Add new menu item(s)', 'stickymenu'); ?></h3>
<table>
<tr><td valign="top" width="200"><?php _e("Number of menu items", 'stickymenu'); ?><br><input type="text" name="item_count" value="1" maxlength="2" style="width:50px;"><input type="submit" name="add_items" value="<?php _e('Go', 'stickymenu'); ?>">
</td><td valign="top"><?php _e("New menu name", 'stickymenu'); ?><br><input type="text" name="new_menu" value="" maxlength="25" style="width:150px;"><input type="submit" name="add_items_and_menu" value="<?php _e('Go', 'stickymenu'); ?>">
</td></tr>
</table>
<hr>
</form>

<?php } else {
?>

<form method="post">
<h3><?php _e('Edit menu item(s)', 'stickymenu'); ?></h3>
<table>
<?php for ($i = 0; $i < $item_count; $i++) {
?>
  <tr><td valign="top"><?php _e("Item title", 'stickymenu'); ?><br><input type="hidden" name="id[]" value="<?php echo $ids[$i]; ?>"><input type="text" name="name[]" value="<?php echo $names[$i]; ?>" maxlength="55" style="width:120px;">
  </td><td valign="top"><?php _e("Link", 'stickymenu'); ?><br><input type="text" name="link[]" value="<?php echo $links[$i]; ?>" maxlength="255" style="width:300px;">
  </td><td valign="top"><?php _e("Menu", 'stickymenu'); ?><br><select name="menu[]" style="width:150px;">
<?php foreach($menu_list as $this_menu) {
?>
<option value="<?php echo $this_menu; ?>" <?php echo (($menus[$i] == $this_menu)? 'selected' : ''); ?>><?php echo $this_menu; ?></option>
<?php };
?>
</select>
  </td><td valign="top"><?php _e("Class name (Optional)", 'stickymenu'); ?><br><input type="text" name="class[]" maxlength="55" style="width:140px;">
  </td><td valign="top"><?php _e("Sort order", 'stickymenu'); ?><br><input type="text" name="weight[]" value="<?php echo (($weights[$i])? $weights[$i] : '0'); ?>" maxlength="3" style="width:80px; text-align:right;">
  </td><td valign="top"><?php _e("Enabled", 'stickymenu'); ?><br><center><input type="checkbox" name="enabled[]" value="1" <?php echo (($disableds[$i])? '' : 'checked'); ?>></center>
  </td></tr>
<?php };  
?>
</table>
<p>
<input type="submit" name="<?php echo ((isset($_POST['add']))? 'insert' : 'update');?>" value="Save">
</p>
<?php
echo '<dl>'."\n";
echo '<dt><em>'; _e('*Item title: ', 'stickymenu'); echo '</em></dt>';
echo '<dd>'; _e('Name of a menu item, such as Home, About us, Gallery, etc.', 'stickymenu'); echo "</dd>\n";
echo '<dt><em>'; _e('*Link: '); echo '</em></dt>';
echo '<dd>'; _e('*Can be the full URL, or the absolute path from your web site. Example: /contact/'); echo "</dd>\n";
echo '<dt><em>'; _e('*Class name: '); echo '</em></dt>';
echo '<dd>'; _e('*An optional CSS class name.'); echo "</dd>\n";
echo '<dt><em>'; _e('*Sort order: '); echo '</em></dt>';
echo '<dd>'; _e('Lesser values are placed first.'); echo "</dd>\n";
echo '</dl>'."\n";
?>
</form>

<?php };
?>

<form method="post">
<?php
$items = $wpdb->get_results("SELECT * FROM `".$table_prefix."stickymenu` ORDER BY `menu`, `weight` ASC", ARRAY_A);
if ($items) {
  foreach($items as $item) {
    if ($item['menu'] <> $current_menu) {
	  if ($current_menu) { echo '</table>'."\n"; };
      $current_menu = $item['menu'];
      echo '<h3>'; _e('Menu', 'stickymenu'); echo " '".$item['menu']."'".'</h3>'."\n";
	  echo '<table>'."\n";
      echo '<tr><th width="50" align="left">';
      echo '</th><th width="140" align="left">'; _e("Item title", 'stickymenu');
      echo '</th><th width="430" align="left">'; _e("Link", 'stickymenu');
      echo '</th><th width="110" align="left">'; _e("Class name", 'stickymenu');
      echo '</th><th width="90" align="left">'; _e("Sort order", 'stickymenu');
      echo '</th><th>&nbsp;';
      echo '</th></tr>';
    };	
?> 
    <tr><td align="center"><input type="checkbox" name="id[]" value="<?php echo $item['id']; ?>"><input type="hidden" name="menu[]" value="<?php echo $item['menu']; ?>">
    </td><td><?php echo $item['name']; ?>
    </td><td><?php echo $item['link']; ?>
    </td><td><?php echo $item['class']; ?>
    </td><td align="center"><?php echo $item['weight']; ?>
    </td><td align="center"><?php echo (($item['disabled'])? '<i>Item disabled</i>' : ''); ?>
    </td></tr>
<?php 
  };
  echo '</table>'."\n";  
};  
echo '<p>';  _e("With selected item(s): ", 'stickymenu');
?>  
<input type="submit" name="disable" value="<?php _e('Disable', 'stickymenu');?>"> 
<input type="submit" name="enable" value="<?php _e('Enable', 'stickymenu');?>"> 
<input type="submit" name="edit" value="<?php _e('Edit', 'stickymenu'); ?>"> 
<input type="submit" name="delete" value="<?php _e('Delete', 'stickymenu'); ?>">
<?php 
  echo '</p>'."\n";
?>  
</form>



</div>