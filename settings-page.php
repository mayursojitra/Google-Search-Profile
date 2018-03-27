<?php

if(isset($_POST['submit_gsp']) && $_POST['submit_gsp'] == "Save Changes"){
	if(isset($_POST['gps_enable']))
		update_option('_gsp_enable',$_POST['gps_enable']);
	if(isset($_POST['gsp_fb']))
		update_option('_gsp_facebook',$_POST['gsp_fb']);
	if(isset($_POST['gsp_twt']))
		update_option('_gsp_twitter',$_POST['gsp_twt']);
	if(isset($_POST['gsp_linkedin']))
		update_option('_gsp_linkedin',$_POST['gsp_linkedin']);
	if(isset($_POST['gsp_gplus']))
		update_option('_gsp_gplus',$_POST['gsp_gplus']);
	if(isset($_POST['gsp_youtube']))
		update_option('_gsp_youtube',$_POST['gsp_youtube']);
	if(isset($_POST['gsp_instagram']))
		update_option('_gsp_instagram',$_POST['gsp_instagram']);

}
/*

<script type="application/ld+json">
{ "@context" : "http://schema.org/",
"@type" : "Organization",
"name" : "Your Organization Name",
"url" : "http://www.your-site.com/",
"sameAs" : [ "http://www.facebook.com/your-profile",
"http://www.twitter.com/yourProfile",
"http://plus.google.com/your_profile"] 
}
</script>

*/
?>

<div id="wpbody-content" aria-label="Main content" tabindex="0">
	<div class="wrap">
		<h1>Google Search Profiles</h1>
<hr/>
		<form method="post" action="admin.php?page=<?php echo GSP_PLUGIN_NAME; ?>" novalidate="novalidate">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="gps_enable">Google Search Profile Enable</label></th>
					<td>
						<label>
							<input type="radio" name="gps_enable" value="1" <?php echo (get_option('_gsp_enable'))?'checked="checked"':""; ?>> <span class="date-time-text format-i18n">Enable</span>
						</label>
						<label>
							<input type="radio" name="gps_enable" value="0" <?php echo (!get_option('_gsp_enable'))?'checked="checked"':""; ?>> <span class="date-time-text format-i18n">Disable</span>
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_fb">Facebook Profile</label></th>
					<td><input name="gsp_fb" type="text" id="gsp_fb" value="<?php echo get_option('_gsp_facebook'); ?>" class="regular-text" placeholder="Facebook Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_twt">Twittre Profile</label></th>
					<td><input name="gsp_twt" type="text" id="gsp_twt" value="<?php echo get_option('_gsp_twitter'); ?>" class="regular-text" placeholder="Twitter Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_linkedin">Linkedin Profile</label></th>
					<td><input name="gsp_linkedin" type="text" id="gsp_linkedin" value="<?php echo get_option('_gsp_linkedin'); ?>" class="regular-text" placeholder="Linkedin Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_gplus">Google Plus Profile</label></th>
					<td><input name="gsp_gplus" type="text" id="gsp_gplus" value="<?php echo get_option('_gsp_gplus'); ?>" class="regular-text" placeholder="Google Plus Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_youtube">Youtube Profile</label></th>
					<td><input name="gsp_youtube" type="text" id="gsp_youtube" value="<?php echo get_option('_gsp_youtube'); ?>" class="regular-text" placeholder="Youtube Profile URL"></td>
				</tr>
				<tr>
					<th scope="row"><label for="gsp_instagram">Instagram Profile</label></th>
					<td><input name="gsp_instagram" type="text" id="gsp_instagram" value="<?php echo get_option('_gsp_instagram'); ?>" class="regular-text" placeholder="Instagram Profile URL"></td>
				</tr>
			</tbody>
		</table>

		<p class="submit"><input type="submit" name="submit_gsp" id="submit_gsp" class="button button-primary" value="Save Changes"></p></form>

	</div>
</div>