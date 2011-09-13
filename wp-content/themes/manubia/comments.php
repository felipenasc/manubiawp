<div style="clear:both;"></div>
<?php // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('Este post &eacute; protegido por senha. Fa&ccedil;a seu login.', 'manubia'); ?></p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h4 id="comments"><?php comments_number(__('Sem coment&aacute;rios', 'manubia'), __('Um coment&aacute;rio', 'manubia'), __('% coment&aacute;rios', 'manubia'));?> <?php printf(__('para &#8220;%s&#8221;', 'manubia'), the_title('', '', false)); ?></h4>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments();?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'manubia'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h4><?php comment_form_title( __('Deixe um coment&aacute;rio', 'manubia'), __('Leave a Reply for %s' , 'manubia') ); ?></h4>

<div id="cancel-comment-reply"> 
	<small><?php cancel_comment_reply_link() ?></small>
</div> 

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'manubia'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'manubia'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'manubia'); ?>"><?php _e('Log out &raquo;', 'manubia'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php _e('Nome', 'manubia'); ?> <?php if ($req) _e("(required)", "manubia"); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e('E-mail (n&atilde;o ser&aacute; publicado)', 'manubia'); ?> <?php if ($req) _e("(obrigadt&oacute;rio)", "manubia"); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website', 'manubia'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'manubia'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'manubia'); ?>" />
<?php comment_id_fields(); ?> 
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
