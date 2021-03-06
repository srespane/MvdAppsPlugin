<?php
        
class MvdTransparency {
	static $add_script;

	static function init() {
		add_shortcode('MvdTransparencyAndale', array(__CLASS__, 'displayTransparency'));
		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function displayTransparency($atts) {
		self::$add_script = true;
        echo '<div class="wrapper">';
            echo '<h1>CAMPAÑA DEL MOMENTO</h1>';
            echo '<h3 class="piso">Innova, ayuda y vestite bien.</h3>';
            drawCampaings();
            echo '<div  class="full_width">';
            echo '<h3 class="piso">Para construir un Montevideo más Inteligente, tenemos que ponernos la camiseta!</h3>';
            echo '</div>';
        echo '</div>';
	}

	static function register_script() {
        wp_enqueue_script( 'mvdTransparencyScript', plugins_url() . '/srespane/js/mvdTransparency.js',array('jquery'),'2.1.3', true );
        wp_enqueue_style( 'mvdTransparencyStyle', plugins_url() . '/srespane/css/mvdTransparencyStyle.css' );
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;
		wp_print_scripts('my-script');
	}
}
    


function drawCampaings()
{
    global $wpdb;
    $arr  = Campaigns();            
    if (is_array($arr) || is_object($arr)){
        foreach ($arr as $i => $row){     
            
            $fDesde = $row['fechaDesde'];
            $fHasta = $row['fechaHasta'];
            $query = $wpdb->prepare("SELECT COUNT(items.order_item_id) as cant,
                                       SUM(itemMeta.meta_value) as ventas,
                                       ABS(DATEDIFF(NOW(),%s)) as falta
                                FROM wp_posts as posts
                                INNER JOIN wp_woocommerce_order_items as items ON posts.ID = items.order_id 
											  AND order_item_type = 'line_item'
                                INNER JOIN wp_woocommerce_order_itemmeta as itemMeta ON items.order_item_id = itemMeta.order_item_id 
												    AND itemMeta.meta_key = '_line_total'
                                WHERE 	posts.post_type 	=  	'shop_order' 
	                               and posts.post_status <> 	'wc-on-hold'
	                               and (DATE(%s) < posts.post_date AND posts.post_date < DATE(%s));",$fHasta,$fDesde,$fHasta);
            
            $rs = $wpdb->get_row($query);
            
            if($row['activa'] === 'si'){
              echo '<div class="campaignLogo one_fourth noPadding">';
              echo '<img src="' . $row['imgLogo'] . '" width="100%" height="100%" />';
              echo '</div>';
              echo '<div class="counter one_fourth">';
                echo '<i class="fa fa-tags counterIcon fa-3x"></i>';
                echo '<h2 class="timer count-title" id="count-number" data-to="' . $rs->cant . '" data-speed="1500"></h2>';
                echo '<p class="count-text "># Ventas</p>';
              echo '</div>';
              echo '<div class="counter one_fourth">';
                echo '<i class="fa fa-money counterIcon fa-3x"></i>';
                echo'<h2 class="timer count-title" id="count-number" data-to="' . $rs->ventas . '" data-speed="1500"></h2>';
                echo '<p class="count-text ">$ Recaudado</p>';
              echo '</div>';
              echo '<div class="counter one_fourth last">';
                echo '<i class="fa fa-flag-checkered counterIcon fa-3x"></i>';
                echo'<h2 class="timer count-title" id="count-number" data-to="' . $rs->falta . '" data-speed="1500"></h2>';
                echo '<p class="count-text ">Días restantes</p>';
              echo '</div>';
            }
        } 
    }else{echo 'Error en array de campaigns!';}
}




function Campaigns(){
    
    $arr_camps = array(
    //Cat 1
    array( "idCamp" => "camp_1", 
           "name" => "ASH", 
           "imgLogo" => "http://www.montevideointeligente.uy/wp-content/uploads/2015/07/logoGenericCampaign.png", 
           "imgLogoAlt" => "Logo animales sin hogar", 
           "fechaDesde" => "2015-07-08 00:00:00", 
           "fechaHasta" => "2015-08-08 00:00:00", 
           "activa"=>"si"),
    );
    return $arr_camps;
}


    
?>