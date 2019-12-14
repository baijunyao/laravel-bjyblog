$(function () {
    // Unlike
    $('.b-like .fa-thumbs-up').click(function () {
        $.ajax({
            type: 'DELETE',
            url: ajaxUnLikeUrl,
            data: {
                article_id: $(this).data('article-id')
            },
            success: (data, status) => {
                var userId = $('#b-login-word .b-user-info').data('user-id');
                $('.b-like .js-like-' + userId).remove();

                $(this).addClass('hidden');
                $('.b-like .fa-thumbs-o-up').removeClass('hidden');

                layer.closeAll();
            },
            error: XMLHttpRequest => {
                if (XMLHttpRequest.status == 401) {
                    layer.msg(translate.pleaseLogin, {
                        icon: 5,
                        time: 2000
                    })
                    $('#b-modal-login').modal('show');
                }
            }
        });
    })

    // Like
    $('.b-like .fa-thumbs-o-up').click(function () {
        $.ajax({
            type: 'POST',
            url: ajaxLikeUrl,
            data: {
                article_id: $(this).data('article-id')
            },
            success: (data, status) => {
                var userId = $('#b-login-word .b-user-info').data('user-id');
                var avatarHtml = $('#b-login-word .b-head_img')[0]['outerHTML'];
                var likeHtml = '<li class="b-head-img js-like-' + userId + '">' + avatarHtml + '</li>';
                $('.b-like .js-like-box').append(likeHtml);

                $(this).addClass('hidden');
                $('.b-like .fa-thumbs-up').removeClass('hidden');

                layer.closeAll();
            },
            error: XMLHttpRequest => {
                if (XMLHttpRequest.status == 401) {
                    layer.msg(translate.pleaseLogin, {
                        icon: 5,
                        time: 2000
                    })
                    $('#b-modal-login').modal('show');
                }
            }
        });
    })
})
