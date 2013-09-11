<div class="wrap">
	<div id="icon-tools" class="icon32"></div>
	<h2><?php echo wp_site_verification_tool::$plugin_name; ?> Settings</h2>
	<div>
		<?php _e( 'This tool help you provide the site verication for any service that you need <br />
					via a comment / meta in the head section or via a file	<br />Examples:<br />
					Google webmaster tool needs a file called <strong>googleXXXXXXXXXXXXX.html</strong>  with no contents or <br /> 
					<strong>&lt;meta name="google-site-verification" content="XXXXXXXXXXXXXXXXXXXXXXXXXXXXX" /></strong> in the head,<br /> 
					Trustwave wants a file called <strong>cert.html</strong> with the contents of 
					<strong>"Trustwave SSL Validation Page"</strong> ',"wp_site_verification_tool" ); ?>
	</div>
	<form action="options.php" method="post">
		<?php settings_fields(wp_site_verification_tool::$option_group); ?>
		<table class="wp-site-verification-tool-form-table form-table">
			<tbody>
				<?php
					$option	= "wp_site_verification_tool_on";
					$label	= __( "Enable plugin: ","wp_site_verification_tool" );
					$title	= __( "Enable plugin: ","wp_site_verification_tool" );
					$name 	= wp_site_verification_tool::option_name( $option );
					$id		= wp_site_verification_tool::option_name( $option );
					$value	= wp_site_verification_tool::get_option( $option );
				?>
				<tr valign="top" title="<?php echo $title ?>">
					<th>
						<?php 
						printf( '<label for="%s">%s</label>',
							$id,
							$label
						);
						?>
					</th>
					<td>
						<?php 
						printf( '<input name="%s" value="%s" id="%s" type="checkbox" class="regular-checkbox" %s />',
							$name,
							'enabled',
							$id,
							checked( $value, 'enabled', false )
						);
						?>						
					</td>
				</tr>
				<?php
					$option	= "wp_site_verification_tool_via_file";
					$label	= __( "Via file or in page head: ","wp_site_verification_tool" );
					$title	= __( "Via file or in page head: ","wp_site_verification_tool" );
					$name 	= wp_site_verification_tool::option_name( $option );
					$id		= wp_site_verification_tool::option_name( $option );
					$value	= wp_site_verification_tool::get_option( $option );
					var_dump(wp_site_verification_tool::get_option( $option ));
					if(!$value)
						$value = false;
				?>
				<tr valign="top" title="<?php echo $title ?>">
					<th>
						<?php 
							echo( $label );
						?>
					</th>
					<?php
					
						printf('<td class="%s">',$option);	
						 
						printf( '<input name="%s" value="%s" id="%s" type="radio" class="regular-checkbox" %s />',
							$name,
							'false',
							$id.'-false',
							checked( $value, 'false', false )
						);
						printf( '<label for="%s">%s</label><br />',
							$id.'-false',
							__( "In page head: ","wp_site_verification_tool" )
						);
						printf( '<input name="%s" value="%s" id="%s" type="radio" class="regular-checkbox" %s />',
							$name,
							'true',
							$id.'-true',
							checked( $value, 'true', false )
						);
						printf( '<label for="%s">%s</label>',
							$id.'-true',
							__( "Via a file: ","wp_site_verification_tool" )
						);


						?>						
					</td>
				</tr>
				<?php

					$option	= "wp_site_verification_tool_file";
					$label	= __( "File name: ","wp_site_verification_tool" );
					$title	= __( "File name: ","wp_site_verification_tool" );
					$name 	= wp_site_verification_tool::option_name($option);
					$id		= wp_site_verification_tool::option_name($option);
					$value	= wp_site_verification_tool::get_option($option);
				
				printf('<tr valign="top" title="%s" id="%s">',$title ,$option);	
				?>
					<th>
						<?php 
						printf('<label for="%s">%s</label>',
							$id,
							$label
						);
						?>
					</th>
					<td nowrap=nowrap>
						<?php 
						printf('%s<input name="%s" value="%s" id="%s" type="text" class="regular-text" placeholder="filename.html" />',
							get_bloginfo('url').'/ ',
							$name,
							$value,
							$id
						);
						?>
					</td>
				</tr><!-- End My Option -->
				<?php
					$option	= "wp_site_verification_tool_contents";
					$label	= __( "Content: ","wp_site_verification_tool" );
					$title	= __( "Content: ","wp_site_verification_tool" );
					$name 	= wp_site_verification_tool::option_name( $option );
					$id		= wp_site_verification_tool::option_name( $option );
					$value	= wp_site_verification_tool::get_option( $option );
				?>
				<tr valign="top" title="<?php echo $title ?>">
					<th>
						<?php 
						printf( '<label for="%s">%s</label>',
							$id,
							$label
						);
						?>						
					</th>
					<td>
						<?php 
						printf( '<textarea name="%s" id="%s" class="regular-textarea" />%s</textarea>',
							$name,
							$id,
							$value
						);
						?>
					</td>
				</tr><!-- End My Option -->
			</tbody>
		</table>
		<p class="submit"><input type="submit" class="button-primary" name="submit" value="Save Changes" /></p>
	</form>
</div><!-- End wrap -->
