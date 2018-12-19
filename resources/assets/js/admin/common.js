$(function () {
    $('.bootstrap-switch').bootstrapSwitch({
        onText: '是',
        offText: '否',
        onColor: 'success'
    });

    function icheckInit() {
        $('.bjy-icheck').iCheck({
            checkboxClass: "icheckbox_minimal-blue",
            radioClass: "iradio_minimal-blue",
            increaseArea: "20%"
        });
    }
    icheckInit();
})
