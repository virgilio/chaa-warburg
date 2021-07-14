jQuery(document).ready(
    function(){
        $('.showsemdata').on(
            'switch-change', 
            function () {
                $('.showsemdata').bootstrapSwitch(
                    'toggleRadioStateAllowUncheck', true);
            });
    });
