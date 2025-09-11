$(document).ready(function () {
    window.refreshCaptcha = function() {
        $.getJSON('/auth/refresh-captcha', function(data) {
            var captcha = data.captcha;

            // span مخفی برای ذخیره عدد
            var $captchaEl = $('#persian-captcha');
            $captchaEl.text(captcha);

            // container
            var $container = $('.captcha-container');

            // حذف تصاویر قدیمی
            $container.find('img').remove();

            // اضافه کردن تصاویر جدید
            $.each(captcha.split(''), function(index, digit) {
                var $img = $('<img>', {
                    src: '/assets/icons/captcha/' + digit + '.jpg',
                    alt: digit,
                    width: 25,
                    height: 25
                });

                $container.append($img); // اضافه می‌کنیم به انتهای container
            });
        });
    };
});
