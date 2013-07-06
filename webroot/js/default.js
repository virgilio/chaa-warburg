jQuery(document).ready(
    function() {
        jQuery('.fancybox').fancybox();
        
        jQuery('#tab_buscas a').click(
            function (e) {
                e.preventDefault();
                jQuery(this).tab('show');
            });
        
        jQuery('.input_chosen').chosen();
        
        jQuery('.carousel').carousel();
        

        
 
    });

var loadslider = function (min, max, inicio, fim){
    jQuery.slider = jQuery("#slider-range")
        .slider({
                    range: true,
                    min: min,
                    max: max,
                    values: [ inicio, fim ],
                    slide: function( event, ui ) {
                        jQuery( "#intervalo" )
                            .val( "de " 
                                  + ui.values[0] 
                                  + (acdc(ui.values[0])) 
                                  + " a " + ui.values[1] 
                                  + (acdc(ui.values[1])));
                        jQuery("#int-inicio").val(ui.values[0]);
                        jQuery("#int-fim").val(ui.values[1]);        
                    },
                    create: function(event, ui){
                        jQuery( "#intervalo" ).val( "de " 
                                                    + inicio 
                                                    + (acdc(inicio)) 
                                                    + " a " 
                                                    + fim 
                                                    + (acdc(fim)));
                    }
                });
    jQuery("#int-inicio").val(jQuery("#slider-range").slider( "values", 0 ))
        .change(function(){
                    jQuery.slider.slider("values", 0, jQuery(this).val());
                    var v0 = jQuery("#slider-range").slider( "values", 0);
                    var v1 = jQuery("#slider-range").slider( "values", 1);
                    $( "#intervalo" ).val( "de " 
                                           + v0 + (acdc(v0)) 
                                           + " a " 
                                           + v1 + (acdc(v1))
                                         );
                });
    jQuery("#int-fim")
        .val(jQuery("#slider-range").slider( "values", 1 ))
        .change(function(){
                    jQuery.slider.slider("values", 1, jQuery(this).val());
                    var v0 = jQuery("#slider-range").slider( "values", 0);
                    var v1 = jQuery("#slider-range").slider( "values", 1);
                    $( "#intervalo" ).val( "de " 
                                           + v0 + (acdc(v0)) 
                                           + " a " 
                                           + v1 + (acdc(v1))
                                         );
                });            
};

function acdc (value){
    if(value == 0) return "";
    return value > 0 ? " d.C" : " a.C";
}
