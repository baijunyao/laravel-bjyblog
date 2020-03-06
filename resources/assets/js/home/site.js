$(function () {
    $('.js-add-site').click(function () {
        $.ajax({
            type: 'GET',
            url: socialiteUserShowUrl,
            success: (data, status) => {
                $('#b-modal-site').modal('show');
            },
            error: response => {
                layer.msg(pleaseLogInFirst, {
                    icon: 5,
                    time: 2000
                })
                $('#b-modal-login').modal('show');
            }
        });
    })

    $('.b-s-submit').click(function () {
        var postData = $('#b-modal-site form').serialize();
        // 显示loading
        layer.load(1);
        // ajax 申请
        $.ajax({
            type: 'POST',
            url: storeSite,
            data: postData,
            success: (data, status) => {
                // 关闭loading
                layer.closeAll();
                layer.msg(submittedSuccessfullyWaitingForApprove, {
                    icon: 1,
                    time: 2000
                })
                $('#b-modal-site').modal('hide');
            },
            error: response => {
                if (response.status == 422) {
                    // 关闭loading
                    layer.closeAll();
                    $.each(response.responseJSON.errors, function (k, v) {
                        layer.msg(v[0], {
                            icon: 5,
                            time: 2000
                        })
                    })
                }
            }
        });
    })
})
