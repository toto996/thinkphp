/**
 * Created by ToTo on 2015/10/24.
 */
wx.ready(function () {
    // 1 �жϵ�ǰ�汾�Ƿ�֧��ָ�� JS �ӿڣ�֧�������ж�
    document.querySelector('#checkJsApi').onclick = function () {
        wx.checkJsApi({
            jsApiList: [
                'getNetworkType',
                'previewImage'
            ],
            success: function (res) {
                alert(JSON.stringify(res));
            }
        });
    };
});

wx.error(function (res) {
    alert(res.errMsg);
});