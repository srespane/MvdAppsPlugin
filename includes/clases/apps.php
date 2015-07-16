<?php

class MvdApps {
	static $add_script;

	static function init() {
		add_shortcode('MvdAppsAndale', array(__CLASS__, 'displayApps'));
		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

static function displayApps($atts) {
    self::$add_script = true;
        echo '<div id="appStore" class="appsContainer">';
        echo '<p>';
            drawCats(); 
            echo '<div class="catExplanation">';
                //echo '<h3><span id="selectedCat">Tecnología</span></h3>';
                echo '<h3 id="selectedCat">Tecnología</h3>';
                //echo '<p><span id="selectedCatDescription">Aunque no solo de la tecnología viven las ciudades, las TIC (tecnologías de la información y la comunicación) son parte de la espina dorsal de cualquier sociedad que quiera llamarse "inteligente".</span></p>';
                echo '<p id="selectedCatDescription">Aunque no solo de la tecnología viven las ciudades, las TIC (tecnologías de la información y la comunicación) son parte de la espina dorsal de cualquier sociedad que quiera llamarse "inteligente".</p>';
            echo '</div>';
        echo '</p>';
        echo '<ul class="apps">';
            drawApps(); 
        echo '</ul>';
    echo '</div>';
    echo '<aside id="popUp" class="popup">';
        echo '<div class="popUpContainer">';
            echo '<a href="#!" title="Close" class="cerrarModal"><i class="fa fa-close fa-2x"></i></a>';
            echo '<h2 id="appTitle">Modal Box</h2>';
            echo '<p id="appDesc">This is a sample modal box that can be created using the powers of CSS3.</p>';
            echo '<p>';
                echo '<a id="lnkPostular" class="lnkBtn btn-links open-modal" href=""><i class="fa fa-arrow-right fa-2x"></i><span>Sugerir</span></a>';
                echo '<a id="lnkArticulo" class="lnkBtn btn-links open-modal" href=""><i class="fa fa-info-circle fa-2x"></i><span>Ver más</span></a>';
                echo '<a id="lnkSitio" class="lnkBtn btn-links open-modal" href="" target="_blank"><i class="fa fa-external-link fa-2x"></i><span>Ir al sitio</span></a>';
                echo '<a id="lnkAndroid" class="lnkBtn btn-links open-modal" href="" target="_blank"><i class="fa fa-android fa-2x"></i> <span>Descargar</span></a>';
                echo '<a id="lnkIos" class="lnkBtn btn-links open-modal" href="" target="_blank"><i class="fa fa-apple fa-2x"></i><span>Descargar</span></a>';
                echo '<a id="lnkWindows" class="lnkBtn btn-links open-modal" href="" target="_blank"><i class="fa fa-windows fa-2x"></i><span>Descargar</span></a>';
            echo '</p>';
        echo '</div>';
        echo '<a href="#!" class="closePopUpOutSide"></a>';
    echo '</aside>';
}

	static function register_script() {
        wp_enqueue_script( 'mvdAppsScript', plugins_url() . '/srespane/js/mvdApps.js',array('jquery'),'1.16.1', true );
        wp_enqueue_style( 'mvdAppsStyle', plugins_url() . '/srespane/css/mvdAppsStyle.css' );
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;
		wp_print_scripts('my-script');
	}
}

?>