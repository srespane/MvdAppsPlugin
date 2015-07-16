/*!
 * VERSION: 1.16.1
 * DATE: 2015-03-13
 * AUTHOR: SRESPANE
 **/
var $btns = jQuery('.boton').click(function () {
    "use strict";
    if (this.id === 'cat_1') {
        jQuery('.apps > .app').fadeIn(450);
    } else {
        jQuery('.apps > .app').hide();
        jQuery('.' + this.id).fadeIn(450);
    }
    $btns.removeClass('activo');
    jQuery(this).addClass('activo');
    
    jQuery('#selectedCat').text(jQuery(this).next('input').val());
    jQuery('#selectedCatDescription').text(jQuery(this).next('input').next('input').val());
});

//*******************************
//FUNCIONES PARA EL DIALOGO MODAL
//*******************************
jQuery(document).ready(function () {
	"use strict";
    jQuery(".normal").click(function () {
		// alert(jQuery(this).parent().find('.info').children('h3').text());
        var appTitle = jQuery(this).parent().find('.info').children('h4').text(),
            appDesc = jQuery(this).parent().find('.info').children('p').text(),
            
            appUrl = jQuery(this).children('input').val(),
            appUrlArticulo = jQuery(this).children('.appUrlArticulo').val(),
            appUrlPostular = jQuery(this).children('.appUrlPostular').val(),
            appUrlAndroid = jQuery(this).children('.appUrlAndroid').val(),
            appUrlIos = jQuery(this).children('.appUrlIos').val(),
            appUrlWindows = jQuery(this).children('.appUrlWindows').val();
            

        
        //correccion al menu de MaxBlog que aparece por delante del popup
        jQuery('#tn-main-nav-wrap').css('z-index', '0');
        
        //Cargar datos en el dialogo modal    
        jQuery('#appTitle').text(appTitle);
        jQuery('#appDesc').text(appDesc);
        //jQuery('#lnkSitio').attr('href', appUrl);

        
        if (appUrl) {
            jQuery('#lnkSitio').show();
            jQuery('#lnkSitio').attr('href', appUrl);
        } else { jQuery('#lnkSitio').hide(); }
        
        if (appUrlArticulo) {
            jQuery('#lnkArticulo').show();
            jQuery('#lnkArticulo').attr('href', appUrlArticulo);
        } else { jQuery('#lnkArticulo').hide(); }
        
        if (appUrlAndroid) {
            jQuery('#lnkAndroid').show();
            jQuery('#lnkAndroid').attr('href', appUrlAndroid);
        } else {jQuery('#lnkAndroid').hide(); }
       
        if (appUrlIos) {
            jQuery('#lnkIos').show();
            jQuery('#lnkIos').attr('href', appUrlIos);
        } else {jQuery('#lnkIos').hide(); }
        
        
        if (appUrlWindows) {
            jQuery('#lnkWindows').show();
            jQuery('#lnkWindows').attr('href', appUrlWindows);
        } else {jQuery('#lnkWindows').hide(); }
        
        if (appUrlPostular) {
            jQuery('#lnkPostular').show();
            jQuery('#lnkPostular').attr('href', appUrlPostular);
        } else {jQuery('#lnkPostular').hide(); }
        
        //return false;
        
    });
    
    //correccion al menu de MaxBlog que aparece por delante del popup
    jQuery('.cerrarModal').click(function () {jQuery('#tn-main-nav-wrap').css('z-index', '9999'); });
    jQuery('.closePopUpOutSide').click(function () {jQuery('#tn-main-nav-wrap').css('z-index', '9999'); });
    
});