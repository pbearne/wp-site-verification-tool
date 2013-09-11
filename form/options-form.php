<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2><?php echo wp_site_verification_tool::$plugin_name; ?> Settings</h2>
	<form action="options.php" method="post">
		<?php settings_fields(wp_site_verification_toolp::$option_group); ?>
		<table class="form-table">
			<tbody>
				<!-- My Option -->
				<?php
					$option	= 'my_option';
					$label	= 'My Option';
					$title	= __( 'title text', 'wp_site_verification_tool' );
					$name 	= wp_site_verification_tool::option_name( $option );
					$id		= wp_site_verification_tool::option_name( $option );
					$value	= wp_site_verification_tool::get_option( $option );
				?>
				<tr valign="top" title="<?php echo $title ?>">
					<th>
						<label for="<?php echo esc_attr( $id ); ?>"><?php echo $label ?></label>
					</th>
					<td>
						<input name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $id ); ?>" type="text" class="regular-text" />
					</td>
				</tr><!-- End My Option -->

			</tbody>
		</table>
		<p class="submit"><input type="submit" class="button-primary" name="submit" value="Save Changes" /></p>
	</form>
</div><!-- End wrap -->
