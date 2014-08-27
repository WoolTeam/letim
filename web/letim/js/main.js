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
        if($.datepicker) {
            jQuery(function($){
                $.datepicker.regional['ru'] = {
                    closeText: 'Закрыть',
                    prevText: '&#x3c;Пред',
                    nextText: 'След&#x3e;',
                    currentText: 'Сегодня',
                    monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                        'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                        'Июл','Авг','Сен','Окт','Ноя','Дек'],
                    dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                    dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                    weekHeader: 'Не',
                    dateFormat: 'dd.mm.yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''};
                $.datepicker.setDefaults($.datepicker.regional['ru']);
            });
            $.datepicker.setDefaults( $.datepicker.regional[ "" ] );
            $(".datepicker_a").datepicker( $.datepicker.regional[ "ru" ]);
        }

    });
})(jQuery, window, document);