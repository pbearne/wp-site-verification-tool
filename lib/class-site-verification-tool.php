<?php
/**
* the output class
**/
class wp_site_verification_output{
	protected static $instance = null;
    protected function __construct()
    {
    
        add_action("init", array( $this, "redirect" ) );

        add_action( "wp_head", array( $this, "do_head" ),1 );
    }

    /**
    * Call this method to get singleton
    *
    * @return wp_site_verification_output
    */
    public static function instance()
    {
        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
	/**
     * manage the redirect if turned on
     * check we have a filename
     * and echo content if filename called
     */
	public function redirect(){
        $enabled = wp_site_verification_tool::get_option( 'wp_site_verification_tool_on' );
        $via_file = wp_site_verification_tool::get_option( 'wp_site_verification_tool_via_file' );
        $file_name = wp_site_verification_tool::get_option( 'wp_site_verification_tool_file' );

        if('enabled' == $enabled && 'true' == $via_file && $file_name){
            if ( false !== stripos( $_SERVER[ 'REQUEST_URI' ], $file_name ) ) {
                header( 'Content-Type: text/html' );
                echo( wp_site_verification_tool::get_option( 'wp_site_verification_tool_contents' ) );
                exit;
            }
        }
	} 
    /**
     * run as part of do head
     * and if turned on add the contents of textarea
     */
    public function do_head(){
        $enabled = wp_site_verification_tool::get_option( 'wp_site_verification_tool_on' );
        $via_file = wp_site_verification_tool::get_option( 'wp_site_verification_tool_via_file' );
       
        if('enabled' == $enabled && 'false' == $via_file){
            echo( "\n".wp_site_verification_tool::get_option( 'wp_site_verification_tool_contents' )."\n" );
        }
    }   

}
$wp_site_verification_output = wp_site_verification_output::instance();