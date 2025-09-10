$(document).ready(function () {
    $(document).on('click', function (e) {
        const id = e.originalEvent.target.id;
        const commentId = id.split("show-comment-form-")[1];

        if (id.includes("show-comment-form-")) {
            const allReplyForms = $('.reply-comment-form');

            for (let i = 0; i < allReplyForms.length; i++) {
                if (!$(allReplyForms[i]).hasClass('hidden') && !allReplyForms[i].id.includes(commentId)) {
                    $(allReplyForms[i]).addClass('hidden');

                    let idNumber = allReplyForms[i].id.split("reply-comment-form-")[1];

                    $(`#show-comment-form-${idNumber}`).text("پاسخ");
                }
            }

            $(`#reply-comment-form-${commentId}`).toggleClass('hidden');

            if ($(`#reply-comment-form-${commentId}`).hasClass('hidden')) {
                $(`#show-comment-form-${commentId}`).text("پاسخ");
            } else {
                $(`#show-comment-form-${commentId}`).text("بستن");
            }
        }
    });
});
