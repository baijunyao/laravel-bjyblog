$(function () {
    $('.b-s-url').click(function () {
        $.get(checkLogin, function(data) {
            console.log(data);
            if(data==1){
                $('#b-modal-site').modal('show');
            }else{
                layer.msg('请先登录', {
                    icon: 5,
                    time: 2000
                })
                $('#b-modal-login').modal('show');
            }
        });
    })

    $('.b-s-submit').click(function () {
        var postData = $('#b-modal-site').serialize();
        $.post(storeSite, postData, function (response) {
            console.log(response);
        }, 'json')
    })
})