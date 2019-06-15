$(function () {
    $('.js-add-site').click(function () {
        $.get(checkLogin, function(data) {
            if(data.status === 1){
                $('#b-modal-site').modal('show');
            }else{
                layer.msg(pleaseLogInFirst, {
                    icon: 5,
                    time: 2000
                })
                $('#b-modal-login').modal('show');
            }
        }, 'json');
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
