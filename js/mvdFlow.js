jQuery(document).ready(function () {
    "use strict";
    jQuery('.step').click(function () {
        jQuery('.step').removeClass("done active");
        jQuery(this).prevAll().addClass("done");
        jQuery(this).addClass("active");
    
        jQuery(".detail").removeClass("verDetalle");
        //alert("#detail_" + $(this).prop("id").split("_")[1]);
        jQuery("#detail_" + jQuery(this).prop("id").split("_")[1]).addClass("verDetalle");
        return false;
    });
});