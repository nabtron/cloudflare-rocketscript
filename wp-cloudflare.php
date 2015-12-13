<?php
    /*
     Plugin Name: Cloudflare Rocketscript
     Plugin URI: http://nabtron.com/cloudflare-rocketscript
     Donate link: payment@nabtron.com
     Description: disables or enables cloudflare rocket script on specific files
     Author: nabtron
     Author URI: http://nabtron.com/
     Version: 0.1
     Min WP Version: 4.4
     Max WP Version: 4.4
     */
// prevent direct access
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

if (!class_exists('nabcfrs_main')) {
	class nabcfrs_main {
		// PHP 5 Constructor
		function __construct(){
			add_action('admin_menu', 'nabcfrs_menu');
            add_filter('script_loader_tag', 'nabcfrs_truefalse', 10, 2);
		}
	}

	function nabcfrs_settings() {
	// Update routines
		if ('insert' == $_POST['action_nabcfrs']) {
    		update_option("nabcfrs_true",$_POST['nabcfrs_true']);
    		update_option("nabcfrs_false",$_POST['nabcfrs_false']);
		}
	?>
		<!-- Start Options Admin area -->
		<div class="wrap">
		  <h2>Cloudflare Rocketscript Options</h2>
		  <div style="margin-top:20px;">
		    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>&amp;updated=true">
		      <div style="">
		      <table class="form-table">
		        <tr>
		          <th scope="row"><strong>Turn rocketscript on for:</strong></th>
		          <td><input name="nabcfrs_true" size="40" value="<?=get_option("nabcfrs_true");?>" type="text" />
		            <br />Comma seperated JS filenames. Make sure rocketscript is set to manual at cloudflare.com</td>
		        </tr>
		        <tr>
		          <th scope="row"><strong>Turn rocketscript off for:</strong></th>
		          <td><input name="nabcfrs_false" size="40" value="<?=get_option("nabcfrs_false");?>" type="text" />
		            <br />Comma seperated JS filenames. Make sure rocketscript is set to automatic at cloudflare.com</td>
		        </tr>
		      </table>
		      <br>
		      <p class="nabcfrs_submit">
		        <input name="action_nabcfrs" size="10" value="insert" type="hidden" />
		        <input name="nabcfrs_submit" type="submit" class="button-primary" id="nabcfrs_submit" value="Save changes">
		      </p>
		    </form>
		    <br /><br /><hr />
		    <center><h4>Developed by <a href="http://nabtron.com/" target="_blank">Nabtron</a>.</h4></center>
		  </div>
		</div>

	<?php
	} // End function nabcfrs_settings()

	// Admin menu Option
	function nabcfrs_menu() {
		add_options_page('Cloudflare Rocketscript', 'Cloudflare Rocketscript', 'manage_options', __FILE__, 'nabcfrs_settings');
	}

	function nabcfrs_getoption($content) {
//		if(!is_admin()) { 
			$nabcfrs_true  = get_option('nabcfrs_true');
			$nabcfrs_false  = get_option('nabcfrs_false');
//		}
	}

    function nabcfrs_truefalse($tag) {
        global $wpdb;
        // get list of files for both true and false
        $nabcfrs_true  = array_filter(explode(',' , get_option('nabcfrs_true')));
        $nabcfrs_false  = array_filter(explode(',' , get_option('nabcfrs_false')));
        
        foreach($nabcfrs_true as $true_script){
            if(true == strpos($tag, $true_script ) )
                return str_replace( ' src', ' data-cfasync="true" src', $tag );
        }

        foreach($nabcfrs_false as $false_script){
            if(true == strpos($tag, $false_script ) )
                return str_replace( ' src', ' data-cfasync="false" src', $tag );
        }
	    return $tag;
    }
}

//instantiate the class
if (class_exists('nabcfrs_main')) {
	$nabwrap_main = new nabcfrs_main();
}    
?>
