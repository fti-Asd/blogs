$(document).ready(function () {
    window.refreshCaptcha = function() {
        $.getJSON('/auth/refresh-captcha', function(data) {
            var captcha = data.captcha;

            var $captchaEl = $('#persian-captcha');
            $captchaEl.text(captcha);

            var $container = $('.captcha-container');

            $container.find('img').remove();

            $.each(captcha.split(''), function(index, digit) {
                var $img = $('<img>', {
                    src: '/assets/icons/captcha/' + digit + '.jpg',
                    alt: digit,
                    width: 25,
                    height: 25
                });

                $container.append($img);
            });
        });
    };
});
