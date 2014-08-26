/**
 * Created by abaddon on 13.08.14.
 */
(function ($, w, d) {
    w.onload = function () {
        $('#sendMail').on('submit', function () {
            var form = $(this), errors = form.find('.error');
            $.ajax({
                type : 'POST',
                data: form.serialize(),
                url: 'send/mail',
                cache: false,
                dataType: 'json'
            }).success(function (data) {
                if (data.success) {
                    form.html(data.success);
                } else {
                    errors.each(function() {
                        var id = $(this).attr('id');
                        if (data.errors[id]) {
                            $(this).html(data.errors[id]);
                        } else {
                            $(this).html('');
                        }
                    });
//                    for(var error in data.errors) {
//                        form.find('#' + error).html(data.errors[error]);
//                    }
                }
            });
            return false;
        });
    };
    $(document).ready(function(){
        $.datepicker.setDefaults( $.datepicker.regional[ "" ] );
        $(".datepicker").datepicker( $.datepicker.regional[ "en" ]);
    });
})(jQuery, window, document);