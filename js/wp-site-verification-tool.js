jQuery(document).ready(function($) {

 var via_file = $('.wp_site_verification_tool_via_file input:checked').val();
 
if( "true" != via_file ){
 	$('#wp_site_verification_tool_file').hide();
}

$( '.wp_site_verification_tool_via_file input' ).on('change',function(){
	$( '#wp_site_verification_tool_file' ).toggle();
})

});