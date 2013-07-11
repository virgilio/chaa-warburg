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

        jQuery('#ano_fim_signal').click(
            function(){       
                if(jQuery('#ObraAnoFim').val() == 0) return;
                var v = jQuery('#ObraAnoFimSignal').val() == 1 ? -1 : 1;
                jQuery('#ano_fim_signal_label').text(v == 1 ? 'd.C' : 'a.C');
                jQuery('#ObraAnoFimSignal').val(v);
            });
        jQuery('#ObraAnoFim').change(
            function(){
                if(jQuery(this).val() == 0) {
                    jQuery('#ano_fim_signal_label').text(""); 
                    jQuery('#ObraAnoFimSignal').val(0);
                } else if(jQuery('#ObraAnoFimSignal').val() == 0){
                    jQuery('#ano_fim_signal_label').text("d.C");
                    jQuery('#ObraAnoFimSignal').val(1);
                }
            });

        
        jQuery('#ano_inicio_signal').click(
            function(){       
                if(jQuery('#ObraAnoInicio').val() == 0) return;
                var v = jQuery('#ObraAnoInicioSignal').val() == 1 ? -1 : 1;
                jQuery('#ano_inicio_signal_label').text(v == 1 ? 'd.C' : 'a.C');
                jQuery('#ObraAnoInicioSignal').val(v);
            });
        jQuery('#ObraAnoInicio').change(
            function(){
                if(jQuery(this).val() == 0) {
                    jQuery('#ano_inicio_signal_label').text(""); 
                    jQuery('#ObraAnoInicioSignal').val(0);
                } else if(jQuery('#ObraAnoInicioSignal').val() == 0){
                    jQuery('#ano_inicio_signal_label').text("d.C");
                    jQuery('#ObraAnoInicioSignal').val(1);
                }
            });
        
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

var acdcChanger = function (){
    
}