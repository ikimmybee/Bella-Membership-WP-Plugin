<?php
	//only admins can get this
	if(!function_exists("current_user_can") || (!current_user_can("manage_options") && !current_user_can("pmpro_updates")))
	{
		die(__("You do not have permissions to perform this action.", 'bella-membership-plugin' ));
	}

	//reset this transient so we know the page was just loaded
	set_transient('pmpro_updates_first_load', true, 60*60*24);
	
	require_once(dirname(__FILE__) . "/admin_header.php");	
?>

<h2><?php _e('Updating Bella Membership Plugin', 'bella-membership-plugin' );?></h2>

<?php
	$updates = get_option('pmpro_updates', array());
	if(!empty($updates)) {
		//let's process the first one
	?>
	<p id="pmpro_updates_intro"><?php _e('Updating.. Please wait.', 'bella-membership-plugin' );?></p>
	<p id="pmpro_updates_progress">[...]</p>
	<textarea id="pmpro_updates_status" rows="10" cols="60">Loading...</textarea>
	
	<?php
	} else {
	?><p><?php _e('Update complete.');?></p><?php
	}
?>

<?php
	require_once(dirname(__FILE__) . "/admin_footer.php");	
?>
