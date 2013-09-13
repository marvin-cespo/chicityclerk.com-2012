<?php 
	if ($_POST['bitly_hidden'] == 'y') {
		//Form data sent
		$user = $_POST['bitly_user'];
		update_option('bitly_user', $user);
		
		$apikey = $_POST['bitly_apikey'];
		update_option('bitly_apikey', $apikey);
		
		$source = $_POST['bitly_source'];
		update_option('bitly_source', $source);
		
		$medium = $_POST['bitly_medium'];
		update_option('bitly_medium', $medium);
		
		$campaign = $_POST['bitly_campaign'];
		update_option('bitly_campaign', $campaign);
		?>
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php  
	} else {
		//Normal page display
		$user = get_option('bitly_user');
		$apikey = get_option('bitly_apikey');
		$source = get_option('bitly_source');
		$medium = get_option('bitly_medium');
		$campaign = get_option('bitly_campaign');
	}
?>

<div class="wrap">
	<?php echo '<h2>' . __('Bitly Linker Settings', 'bitly_trdon') . '</h2>'; ?>
	<form name="bitly_form" method="POST" action="<?php echo str_replace('%&E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="bitly_hidden" value="y">
		<p>Bit.ly Linker is a plugin by <a href="http://isitablog.co.uk">Andy Gaukrodger</a> to automatically give you a bit.ly short URL for each of your posts.<br />In order to use the plugin you need a <a href="http://bit.ly/a/sign_up">bit.ly account</a> and <a href="http://bit.ly/a/your_api_key">API key</a>.
		<hr />  
        <?php    echo "<h4>" . __( 'Bit.ly Settings', 'bitly_trdom' ) . "</h4>"; ?>  
		<p><?php _e('Username: '); ?><input type="text" name="bitly_user" value="<?php echo $user; ?>" size="20"><?php _e('ex: bitly_user. '); ?></p>
		<p><a href="http://bit.ly/a/sign_up">Get a Bit.ly username</a>.</p>
		<p><?php _e('API Key: '); ?><input type="text" name="bitly_apikey" value="<?php echo $apikey; ?>" size="20"><?php _e('ex: API_Key'); ?></p>
		<p><a href="http://bit.ly/a/your_api_key">Get a Bit.ly API Key</a>.</p>
		<hr />
        <?php    echo "<h4>" . __( 'Analytics Settings', 'bitly_trdom' ) . "</h4>"; ?>
        <p>Enter the source, medium and campaign name you want so that your Google Analytics account can manage your bit.ly links instead of them being added to <em>Direct Traffic</em>.  
		<p><?php _e('Source: '); ?><input type="text" name="bitly_source" value="<?php echo $source; ?>" size="20"><?php _e('ex: bit.ly'); ?></p>
		<p><?php _e('Medium: '); ?><input type="text" name="bitly_medium" value="<?php echo $medium; ?>" size="20"><?php _e('ex: linker'); ?></p>
		<p><?php _e('Campaign: '); ?><input type="text" name="bitly_campaign" value="<?php echo $campaign; ?>" size="20"><?php _e('ex: myblog_campaign'); ?></p>
		<p>Now update your options and go to your widgets page to enable the bit.ly Linker widget.</p> 
		<p class="submit">  
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'bitly_trdom' ) ?>" />  
        </p>
	</form>
</div>