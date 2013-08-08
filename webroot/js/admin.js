jQuery(document).ready(
    function() {
        jQuery('#step-bar a').click(
            function (e) {
                e.preventDefault();
                jQuery(this).tab('show');
            });
        jQuery('.typeahead').typeahead();


        $('.postantequam').on('switch-change', function () {
            $('.postantequam').bootstrapSwitch('toggleRadioStateAllowUncheck', true);
        });

    });

bkLib.onDomLoaded(
    function(){
        var myEditor = new nicEditor({fullPanel : true, iconsPath : '/chaa-warburg/img/nicEditorIcons.gif' })
            .panelInstance('ObraDescricao')
            .panelInstance('ArtistaBiografia');


        myEditor.addEvent('blur', 
                          function() {
                              myEditor.instanceById('ArtistaBiografia').saveContent();
                          });
    });