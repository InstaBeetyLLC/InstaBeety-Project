
var edit = function () {
    $('.click2edit').summernote({focus: true});
};
var save = function () {
    var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
    $('.click2edit').destroy();
};


$(document).ready(function () {

        $('.summernote').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol']]
        ]
    });


    $.getJSON(current_url+'/get_emails_list', function (email_list) {
        $(".select2_demo_2").select2({
            data: email_list
        });
    });


});


var current_url=$('#current_url').val();
function sendEmail(){
    var url             = current_url+ "/send_email";
    var $post             = {};
    $post.to        = $('#send_to').val();
    $post.email        = $('#email').val();
    $post.subject        = $('#subject').val();
    $post.body        = ($(".summernote").code());
    $.ajax({
        type: "post",
        url: url,
        data: $post,
        dataType: "html",
        cache: false,
        success: function(data) {

    window.location.replace(current_url+"/inbox");

        }
    });

}




