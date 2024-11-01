<?php
/*
Plugin Name: WPMU Fast Verification for Google Webmaster Tools and Yahoo! Site Explorer
Plugin URI: http://www.myfastblog.com
Description: Is an easy and faster tool for WPMU to pass verification on: Google Webmaster Tools, Yahoo! SiteExplorer, Bing Webmaster Center & Alexa Siteowners
Author: Haotik
Version: 2.0
Author URI: http://www.haotik.ro
*/

if ( strpos($_SERVER['REQUEST_URI'], 'wp-admin') == true )
{
	function blog_wpmufv_options()
		{
			if ( isset($_POST['action'])&& ( $_POST['action'] == 'update_wpmufastver' ) ){
				update_option('wpmufastver_google', $_POST['wpmufastver_google']);
				update_option('wpmufastver_yahoo', $_POST['wpmufastver_yahoo']);
				update_option('wpmufastver_bing', $_POST['wpmufastver_bing']);
				update_option('wpmufastver_alexa', $_POST['wpmufastver_alexa']);
				?>
				<div id="message" class="updated fade"><p><?php _e('Options saved.') ?></p></div>
				<?php
			}
			$wpmufastver_google = get_option('wpmufastver_google');
			$wpmufastver_yahoo = get_option('wpmufastver_yahoo');
			$wpmufastver_bing = get_option('wpmufastver_bing');
			$wpmufastver_alexa = get_option('wpmufastver_alexa');

		?>
		<div class="wrap">
		<h2><?php  _e('WPMU Fast Verification - Config'); ?></h2>
		<form method="post" action="">
		<input type="hidden" name="action" value="update_wpmufastver" />
		<fieldset class="options">
		<p>Put the Google Webmaster Tools, Yahoo! Site Explorer,  Bing Webmaster Center & Alexa Siteowners code in the field.</p>
		<p>See the help section below.</p>
		Google: <input size="40" type="text" name="wpmufastver_google" value="<?php echo $wpmufastver_google ?>" /><br/>
		Example Google:<br/>
		&lt;meta name="verify-v1" content="<b><font color="red">hp1HyZbMIltV_zjrL7UiGiel72xQasUthm6wA8nDXXX</font></b>" /&gt;<br/><br/>
		Yahoo!: <input size="40" type="text" name="wpmufastver_yahoo" value="<?php echo $wpmufastver_yahoo ?>" /><br/>
		Example Yahoo:<br/>
		&lt;META name="y_key" content="<b><font color="red">4ere73w8kjjsue5n</font></b>" &gt;<br/><br/>
		Bing: <input size="40" type="text" name="wpmufastver_bing" value="<?php echo $wpmufastver_bing ?>" /><br/>
		Example Bing:<br/>
		&lt;META name="msvalidate.01" content="<b><font color="red">17D5E8FF97595EA6B7B5EBB754A98F53C4</font></b>" &gt;<br/><br/>
		Alexa: <input size="40" type="text" name="wpmufastver_alexa" value="<?php echo $wpmufastver_alexa ?>" /><br/>
		Example Alexa:<br/>
		&lt;META name="alexaVerifyID" content="<b><font color="red">kiebfisJYr34d5H2HK</font></b>" &gt;<br/>
		</fieldset>
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
		 
		</form>
		</div>
		<div class="wrap"> 
		  <h2>Help</h2>
			  <fieldset class="options">
				<p>Follow the links and get meta verification key :</p>
				<p>Enter your meta "content" value to verify your blog with:<br/>
				<a href="https://www.google.com/webmasters/tools/" target="_BLANK">Google Webmaster Tools</a>,<br/>
				<a href="https://siteexplorer.search.yahoo.com/" target="_BLANK">Yahoo Site Explorer</a>,<br/>
				<a href="http://www.bing.com/webmaster" target="_BLANK">Bing Webmaster Center</a> and <br/>
				<a href="http://www.alexa.com/siteowners" target="_BLANK">Alexa Siteowners</a>.<br/>	
					
				<p>	Pick the bold red text from the above examples and put in the fields above.</p>
			</fieldset>

			More WMPU Plugins on <a target="_BLANK" href="http://www.myfastblog.com">MyFastBlog</a>
		</div>
		<?php
		}

		function blog_wpmufv_page(){
			add_options_page(__('Fast Verfication'),__('Fast Verfication'),8,basename(__FILE__),'blog_wpmufv_options');
		} 
		add_action('admin_menu','blog_wpmufv_page');
}


function wpmufastver_add_meta() 
{
	$wpmufastver_google = get_option('wpmufastver_google');
	$wpmufastver_yahoo = get_option('wpmufastver_yahoo');
	$wpmufastver_bing = get_option('wpmufastver_bing');
	$wpmufastver_alexa = get_option('wpmufastver_alexa');
	if ( ($wpmufastver_google!='') || ($wpmufastver_yahoo!='') || ($wpmufastver_bing!='') || ($wpmufastver_alexa!='') )
	{
		echo "<!-- WPMU Fast Verification for Google Webmaster Tools, Yahoo! Site Explorer, Bing Webmaster Center and Alexa Siteowners  [www.myfastblog.com] -->";
		if ($wpmufastver_google!='') { echo "\n".'<meta name="google-site-verification" content="'.$wpmufastver_google.'" />';};
		if ($wpmufastver_yahoo!='') { echo "\n".'<meta name="y_key" content="'.$wpmufastver_yahoo.'" />';};
		if ($wpmufastver_bing!='') { echo "\n".'<meta name="msvalidate.01" content="'.$wpmufastver_bing.'" />';};
		if ($wpmufastver_alexa!='') { echo "\n".'<meta name="alexaVerifyID" content="'.$wpmufastver_alexa.'" />';};
		echo "\n<!-- WPMU Fast Verification for Google Webmaster Tools, Yahoo! Site Explorer, Bing Webmaster Center and Alexa Siteowners -->\n";
	};
}

add_action('wp_head', 'wpmufastver_add_meta');
?>
