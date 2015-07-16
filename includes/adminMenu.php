<?php
// create custom plugin settings menu
add_action('admin_menu', 'mvdApps_plugin_create_menu');

function mvdApps_plugin_create_menu() {
	//Top menu level MvdApps Settings
	add_menu_page('MvdApps Plugin Settings', 'MvdApps Settings', 'administrator', 
	'mvdApps_plugin_settings', 'mvdApps_plugin_settings_page' , 'dashicons-admin-generic' );
    
    //Sub menu level MvdApps Settings -> Aplicaciones
    add_submenu_page( 'mvdApps_plugin_settings', 'mvdApps Administrar Aplicaciones', 'Aplicaciones', 'administrator', 'mvdApps_administrar_aplicaciones', 'mvdApps_adminApps');
    
    //Sub menu level MvdApps Settings -> Categorias
    add_submenu_page( 'mvdApps_plugin_settings', 'mvdApps Administrar Categorias', 'Categorias', 'administrator', 'mvdApps_administrar_categorias', 'mvdApps_adminCats');
    
    
	//call register settings function
	add_action( 'admin_init', 'register_my_cool_plugin_settings' );
}


function register_my_cool_plugin_settings() {
	//register our settings
	register_setting( 'my-cool-plugin-settings-group', 'new_option_name' );
	register_setting( 'my-cool-plugin-settings-group', 'some_other_option' );
	register_setting( 'my-cool-plugin-settings-group', 'option_etc' );
}


function mvdApps_adminApps(){}
function mvdApps_adminCats(){
    echo '<h3>Posts magicos! </h3>';
    //$the_query = new WP_Query( 'cat=4' );
    $the_query = new WP_Query('author=1');

    // The Loop
    if ( $the_query->have_posts() ) {
        echo '<ul>';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<li>' ;
            //TITULO
            echo get_the_title() . '<br/>';
            //CONTENIDO
            echo get_the_content() . '<br/>';
            if ( has_post_thumbnail() ) {
                //ruta a la imagen del post
                echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) . '<br/>';
            }
            echo '</li>';
        }
        echo '</ul>';
    } else {
        // no posts found
    }
    wp_reset_postdata();
}


function mvdApps_plugin_settings_page() {
?>
<div class="wrap">
<h2>MvdApps Plugin</h2>
<h4>Set de aplicaciones que hacen de Montevideo una ciudad mas inteligente.</h4>


<form method="post" action="options.php">
    <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>