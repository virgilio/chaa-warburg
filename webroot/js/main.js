jQuery(document).ready(
    function() {
        document.getElementById('file-input').onchange = function (e) {  
            loadImage(
                e.target.files[0],
                function (img) {
                    jQuery("#result").append(img);
                    jQuery("#result img").Jcrop();
                    //document.body.appendChild(img);
                },
                {maxWidth: 600} // Options
            );
        };
    });