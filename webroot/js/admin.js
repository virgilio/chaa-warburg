jQuery(document).ready(
    function() {
        jQuery('#step-bar a').click(
            function (e) {
                e.preventDefault();
                jQuery(this).tab('show');
            });
        jQuery('.typeahead').typeahead();
    });

bkLib.onDomLoaded(function(){
  var myEditor = new nicEditor({fullPanel : true }).panelInstance('ObraDescricao');
  /*myEditor.addEvent('add', function() {
    alert( myEditor.instanceById('ObraDescricao').getContent() );
  });*/
});