<div class="row mailing-row">
	<div class="mailing-list md-col-4">
		<?php echo __("<h3>Subscribe to our news letter</h3>", NAME);
		$username = "";
		$useremail = "";
		if(wp_get_current_user()->display_name){
			$username = wp_get_current_user()->display_name;
		}
		if(wp_get_current_user()->user_email){
			$useremail = wp_get_current_user()->user_email;
		}
		 $options = get_option('dbc_settings');
		 $more = get_option('dbc_more_settings');
		 //var_dump($more);

		?>

		<!-- Begin MailChimp Signup Form -->
		<div id="mc_embed_signup">
		<form action="<?php echo $options['form_name']; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		<div id="mc_embed_signup_scroll">
			<div class="mc-field-group">
				<input type="text" value="<?php echo $username; ?>" name="FNAME" class="" id="mce-FNAME" placeholder="First Name">
			</div>
			<div class="mc-field-group">
				<input type="email" value="<?php echo $useremail; ?>" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email ">
			</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="<?php echo $options['from_id']; ?>" tabindex="-1" value=""></div>
			<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"></div>
			<?php if(!empty($options['footer_message_under'])): ?>
				<div class="clear">
					<?php echo $options['footer_message_under']; ?>
				</div>
			<?php endif; ?>

			</div>
		</form>
		</div>
		<!--End mc_embed_signup-->

	</div>

		<?php if(isset($more['hide_ads'])): ?>

			<div class="md-col-6 md-float-right  adbanner-holder">
				<a target="blank" href="https://airbasecosmetics.co.za">
					<img target="blank" class="adbanner" src="<?php echo IMAGES . 'airbase-adbanner.jpg' ?>" alt="Airbase" />
				</a>
			</div>
		<?php endif; ?>

</div>	<!-- row -->
