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

        $("#slider-range").slider({
                                        range: true,
                                        min: -775,
                                        max: 500,
                                        values: [ 0, 300 ],
                                        slide: function( event, ui ) {
                                            $( "#intervalo" ).val( "de " + ui.values[0] + (acdc(ui.values[0])) + " a " + ui.values[1] + (acdc(ui.values[1])));
                                            jQuery("#int-inicio").val(ui.values[0]);
                                            jQuery("#int-fim").val(ui.values[1]);        
                                        }
                                    });
        jQuery("#int-inicio").val(jQuery("#slider-range").slider( "values", 0 ));
        jQuery("#int-fim").val(jQuery("#slider-range").slider( "values", 1 ));        
        
        function acdc (value){
            if(value == 0) return "";
            return value > 0 ? " d.C." : " a.C";
        }
    });