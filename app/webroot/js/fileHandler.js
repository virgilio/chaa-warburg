var jcrop_api, boundx, boundy;

function fileHandler() {
    // get selected file
    var oFile = $('#image_file_show')[0].files[0];

    jQuery('body').append(jQuery('<div />').addClass("error"));
    
    // hide all errors
    $('.error').hide();

    // check for image type (jpg and png are allowed)
    var rFilter = /^(image\/jpeg|image\/png)$/i;
    if (! rFilter.test(oFile.type)) {
        $('.error').html('Por favor selecione um arquivo válido de imagem (jpg, png)').show();
        return;
    }

    // check for file size
    if (oFile.size > 25 * 1024 * 1024) {
        $('.error').html('O arquivo é muito grande (maior que 25Mb), entre em contato com o administrador').show();
        return;
    }

    // preview element
    var oImage = document.getElementById('preview_show');
    
    // prepare HTML5 FileReader
    var oReader = new FileReader();
    oReader.onload = function(e) {
        // e.target.result contains the DataURL which we can use as a source of the image
        oImage.style.height = 'auto';
        oImage.src = e.target.result;
        oImage.onload = function () { // onload event handler            
            var sResultFileSize = bytesToSize(oFile.size);
            var fileType = oFile.type;
            var filedim  = oImage.naturalWidth + ' x ' + oImage.naturalHeight;
        };
    };
    
    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
}