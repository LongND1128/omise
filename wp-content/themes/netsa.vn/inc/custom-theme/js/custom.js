jQuery(document).ready(function($){
    $('.group-image .upload-btn').click(function(e) {
        $input = $(this).parents('.group-image').find('.image');
        e.preventDefault();
        var image = wp.media({
            title: 'Chọn Ảnh',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $input.val(image_url);
        });
    });
    $('.group-image .remove-image').click(function(e) {
        $(this).parents('.group-image').find('.image').val('');
    });

    $('.ajax-custom').click(function()
    {
        var link = getScriptLocation().replace("js/custom.js", "ajax.php"); ;
        var emailAdmin = $('.emailAdmin').val();
        var blognameC = $('.blognameC').val();
        jQuery.ajax(
        {
            type:'POST',
            url: 'https://omise.vn/wp-content/themes/netsa.vn/inc/custom-theme/ajax.php',
            dataType:'json',
            data:{
                "emailAdmin":emailAdmin,
                "blognameC":blognameC,
            },
            success: function(data)
            {
                alert('Cập nhật thông tin thành công !');
            },
            error: function(xhr, ajaxOptions, thrownError){
                jAlert(thrownError,'error');
            }
        });
        return false;

    });
});
function getScriptLocation() {
    var fileName    = "fileName";
    var stack       = "stack";
    var stackTrace  = "stacktrace";
    var loc     = null;

    var matcher = function(stack, matchedLoc) { return loc = matchedLoc; };

    try {

        // Invalid code
        0();

    }  catch (ex) {

        if(fileName in ex) { // Firefox
            loc = ex[fileName];
        } else if(stackTrace in ex) { // Opera
            ex[stackTrace].replace(/called from line \d+, column \d+ in (.*):/gm, matcher);
        } else if(stack in ex) { // WebKit, Blink and IE10
            ex[stack].replace(/at.*?\(?(\S+):\d+:\d+\)?$/g, matcher);
        }

        return loc;
    }

};