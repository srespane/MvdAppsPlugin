<?php
    
    
    
class MvdFlow {
	static $add_script;

	static function init() {
		add_shortcode('MvdFlowAndale', array(__CLASS__, 'displayFlow'));
		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function displayFlow($atts) {
		self::$add_script = true;
        ?>

<h5>Construyendo un Montevideo más Inteligente a través de la responsabilidad social empresarial.</h5>
<p>
La responsabilidad social empresarial se manifiesta como una respuesta ante la necesidad de un desarrollo sostenible que proteja el medio ambiente y las comunidades, sin descuidar los temas económicos. La demanda civil sobre el protagonismo desempeñado por las empresas, al igual que el impacto de sus actividades en la sociedad y en el medio ambiente vienen en creciente aumento en los últimos años.</p>

<p>Así es como Montevideo Inteligente prepara un equipo de consultores especializados en tecnologías de la información (TIC) y analistas en calidad (QA), que trabajando en conjunto con comunicadores sociales y fundaciones diseñan, gestionan y ejecutan proyectos de alto impacto ajustados al perfil de la empresa y de la causa sensibilizadora.</p>
<h5>¿Cómo trabajamos?</h5>
<p>Diseñamos un proceso de trabajo que contempla todas las vertientes del RSE del siglo XXI, contemplando tanto el plano social como la tecnología para brindar una solución innovadora, eficiente y sustentable.</p>

<h5>Nuestro proceso</h5>
<div id="steps">
  <div id="step_1" class="step active" data-desc="1. Reunión inicial"><i class="fa fa-flag fa-2x"></i></div>
  <div id="step_2" class="step" data-desc="2. Propuesta"><i class="fa fa-file-text fa-2x"></i></div>
  <div id="step_3" class="step" data-desc="3. Reunión de ajustes"><i class="fa fa-pencil-square fa-2x"></i></div>
  <div id="step_4" class="step" data-desc="4. Ejecución del proyecto"><i class="fa fa-cogs fa-2x"></i></div>
  <div id="step_5" class="step" data-desc="5. Resultados"><i class="fa fa-line-chart fa-2x"></i></div>
</div>
<div id="details">
  <div id="detail_1" class="detail verDetalle">
    <h5>Reunión inicial</h5>
    <p>Se estudia el perfil de la compañía y de la causa sensibilizadora, conociendo las campañas de RSE ya aplicadas por la misma – si las tuvo -, y se identifica el segmento objetivo de la campaña a realizar.</p>
  </div>
  <div id="detail_2" class="detail">
    <h5>Generación de propuesta</h5>
    <p>El equipo multi-disciplinario de Montevideo Inteligente genera un proyecto tecnológico-social que cumpla con las expectativas anteriormente fijadas, estableciendo los plazos necesarios para su realización, generando así una propuesta de cronograma de trabajo.</p>
  </div>
  <div id="detail_3" class="detail">
    <h5>Reunión de ajustes</h5>
    <p>En esta instancia se revisan las observaciones que se tengan respecto al proyecto presentado y se ajustan los detalles para dar inicio a la ejecución del proyecto.</p>
  </div>
  <div id="detail_4" class="detail">
    <h5>Ejecución del proyecto</h5>
    <p>Se inician los desarrollos y se comienza con el monitoreo de las actividades, mediante un software dispuesto por parte de Montevideo Inteligente con el cual se podrá verificar el % de avance en cada una de las actividades previamente definidas.</p>
  </div>
  <div id="detail_5" class="detail">
    <h5>Entrega de indicadores finales del proyecto</h5>
    <p>Para concluir con el proyecto, el equipo multi-disciplinario de Montevideo Inteligente elaborará un completo informe técnico-social que evalúe la actividad desarrollada desde cada punto de vista, estudiando el impacto de la campaña realizada.</p>
  </div>
</div>
<div id="stepsFooter">
Aquellas empresas interesadas en consultar las diversas metodologías de RSE que ofrece Montevideo Inteligente pueden conocer más solicitando información a <strong>RSE@montevideointeligente.uy</strong>
  </div>

<?php
        
	}

	static function register_script() {
        wp_enqueue_script( 'mvdFlowScript', plugins_url() . '/srespane/js/mvdFlow.js',array('jquery'),'1.16.1', true );
        wp_enqueue_style( 'mvdFlowStyle', plugins_url() . '/srespane/css/mvdFlowStyle.css' );
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;
		wp_print_scripts('mvdFlowScript');
        wp_print_style('mvdFlowStyle');
	}
}
    
    
?>