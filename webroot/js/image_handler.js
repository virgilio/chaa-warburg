var ImageHandler = ImageHandler || {};

(function (){
    // Convert bytes to friendly format (MB)
    ImageHandler.bytesToSize = function (bytes) {
        var sizes = ['Bytes', 'KB', 'MB'];
        if (bytes == 0) return 'n/a';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
    };

    // Test if number is valid and return it
    ImageHandler.validNumber = function(n){
        if(isNaN(n) || n === ''){
            return 1;
        } else return parseInt(n, 10);
    }

    // check for selected crop region
    ImageHandler.checkForm = function() {
        if(!jQuery("#filedim").val() ||  !jQuery("#filetype").val() || 
            !jQuery("#filedim").val()){
            jQuery('.error')
                .html('Por favor, selecione uma imagem e um miniatura').show();
            return false;
        }
        return true;
    };

    ImageHandler.fileSelectHandler = function () {
        // get selected file
        var oFile = $('#image_file')[0].files[0];

        // hide all errors
        $('.error').hide();

        // check for image type (jpg and png are allowed)
        var rFilter = /^(image\/jpeg|image\/png)$/i;
        if (! rFilter.test(oFile.type)) {
            $('.error')
                .html('Por favor selecione um arquivo '
                        + 'válido de imagem (jpg, png)')
                .show();
            return;
        }

        // check for file size
        if (oFile.size > 25 * 1024 * 1024) {
            $('.error')
                .html('O arquivo é muito grande (maior que 25Mb), '
                        + 'entre em contato com o administrador')
                .show();
            return;
        }

        // get preview element
        var oImage = document.getElementById('preview');

        // prepare HTML5 FileReader
        var oReader = new FileReader();
        oReader.onload = function(e) {
            // e.target.result contains the DataURL which we can use as 
            // a source of the image
            oImage.style.height = 'auto';
            oImage.src = e.target.result;
            oImage.onload = function () { // onload event handler            
                // display step 2
                $('.step2').fadeIn(500);
                // display some basic image info
                var sResultFileSize = ImageHandler.bytesToSize(oFile.size);
                $('#filesize').val(sResultFileSize);
                $('#filetype').val(oFile.type);
                $('#filedim').val(oImage.naturalWidth 
                        + ' x ' 
                        + oImage.naturalHeight);
            };
        };

        // read selected file as DataURL
        oReader.readAsDataURL(oFile);
    }
})();
