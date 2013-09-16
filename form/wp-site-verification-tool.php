<div class="wrap">
	<div id="icon-tools" class="icon32"></div>
	<h2><?php echo wp_site_verification_tool::$plugin_name; ?> Settings</h2>
	<div>
		<?php _e( 'This tool help you provide the site verication for any service that you need <br />
					via a comment / meta in the head section or via a file	<br />Examples:<br />
					Google webmaster tool needs a file called <strong>googleXXXXXXXXXXXXX.html</strong>  with no contents 
					<br /> or <br />
					<strong>&lt;meta name="google-site-verification" content="XXXXXXXXXXXXXXXXXXXXXXXXXXXXX" /></strong> in the head,
					<br />
					Trustwave SSL wants a file called <strong>cert.html</strong> in the root with the contents of
					<strong>"Trustwave SSL Validation Page"</strong> ','wp_site_verification_tool' ); ?>
	</div>
	<form action="options.php" method="post">
		<?php settings_fields( wp_site_verification_tool::$option_group ); ?>
		<table class="wp-site-verification-tool-form-table form-table">
			<tbody>
				<?php
					$option	= 'wp_site_verification_tool_on';
					$label	= __( 'Enable plugin: ', 'wp_site_verification_tool' );
					$title	= $label;
					$name 	= wp_site_verification_tool::option_name( $option );
					$id		= wp_site_verification_tool::option_name( $option );
					$value	= wp_site_verification_tool::get_option( $option );
				?>
				<tr valign="top" title="<?php echo $title ?>">
					<th>
						<?php
						printf( '<label for="%s">%s</label>',
							esc_attr( $id ),
							$label
						);
						?>
					</th>
					<td>
						<?php
						printf( '<input name="%s" value="%s" id="%s" type="checkbox" class="regular-checkbox" %s />',
							esc_attr( $name ),
							esc_attr( 'enabled' ),
							esc_attr( $id ) ,
							esc_attr( checked( $value, 'enabled', false ) )
						);
						?>
					</td>
				</tr>
				<?php
					$option	= 'wp_site_verification_tool_via_file';
					$label	= __( 'Via file or in page head: ', 'wp_site_verification_tool' );
					$title	= $label;
					$name 	= wp_site_verification_tool::option_name( $option );
					$id		= wp_site_verification_tool::option_name( $option );
					$value	= wp_site_verification_tool::get_option( $option );
					var_dump( wp_site_verification_tool::get_option( $option ) );
					if( ! $value )
						$value = false;
				?>
				<tr valign="top" title="<?php echo $title ?>">
					<th>
						<?php echo( $label ); ?>
					</th>
					<?php

						printf('<td class="%s">', esc_attr( $option ) );

						printf( '<input name="%s" value="%s" id="%s" type="radio" class="regular-checkbox" %s />',
							esc_attr( $name ),
							esc_attr( 'false' ),
							esc_attr( $id.'-false' ),
							esc_attr( checked( $value, 'false', false ) )
						);
						printf( '<label for="%s">%s</label><br />',
							esc_attr( $id . '-false' ),
							__( "In page head: ",'wp_site_verification_tool' )
						);
						printf( '<input name="%s" value="%s" id="%s" type="radio" class="regular-checkbox" %s />',
							esc_attr( $name ),
							esc_attr( 'true' ),
							esc_attr( $id.'-true' ),
							esc_attr( checked( $value, 'true', false ) )
						);
						printf( '<label for="%s">%s</label>',
							esc_attr( $id.'-true' ),
							__( "Via a file: ",'wp_site_verification_tool' )
						);

						?>
					</td>
				</tr>
				<?php

					$option	= 'wp_site_verification_tool_file';
					$label	= __( 'File name: ','wp_site_verification_tool' );
					$title	= $label;
					$name 	= wp_site_verification_tool::option_name( $option );
					$id		= wp_site_verification_tool::option_name( $option );
					$value	= wp_site_verification_tool::get_option( $option );

				printf( '<tr valign="top" title="%s" id="%s">', esc_attr( $title ), esc_attr( $option ) );
				?>
					<th>
						<?php
						printf('<label for="%s">%s</label>',
							esc_attr( $id ),
							$label
						);
						?>
					</th>
					<td nowrap=nowrap>
						<?php
						printf('%s<input name="%s" value="%s" id="%s" type="text" class="regular-text" placeholder="filename.html" />',
							esc_attr( get_bloginfo( 'url' ) . '/ ' ),
							esc_attr( $name ),
							esc_attr( $value ),
							esc_attr( $id )
						);
						?>
					</td>
				</tr><!-- End My Option -->
				<?php
					$option	= 'wp_site_verification_tool_contents';
					$label	= __( 'Content: ', 'wp_site_verification_tool' );
					$title	= $label;
					$name 	= wp_site_verification_tool::option_name( $option );
					$id		= wp_site_verification_tool::option_name( $option );
					$value	= wp_site_verification_tool::get_option( $option );
				?>
				<tr valign="top" title="<?php echo $title ?>">
					<th>
						<?php
						printf( '<label for="%s">%s</label>',
							esc_attr( $id ),
							$label
						);
						?>
					</th>
					<td>
						<?php
						printf( '<textarea name="%s" id="%s" class="regular-textarea" />%s</textarea>',
							esc_attr( $name ),
							esc_attr( $id ),
							esc_attr( $value )
						);
						?>
					</td>
				</tr><!-- End My Option -->
			</tbody>
		</table>
		<p class="submit"><input type="submit" class="button-primary" name="submit" value="Save Changes" /></p>
	</form>
</div><!-- End wrap -->
