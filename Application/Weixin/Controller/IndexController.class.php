<?php
namespace Weixin\Controller;
use Think\Controller;
class IndexController extends Controller {
    private $appID = '';
    private $appsecret = '';

    public function __construct($appID, $appsecret) {
        $this->appID = $appID;
        $this->appsecret = $appsecret;
    }

    public function index(){

    }

    public function getToken() {
        return $this->doGetToken();
    }

    private function doGetToken($appID, $appsecret) {
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.
            $this->appID.'&secret='.$this->appsecret;

        $output = $this->httpGet($url);
        $output = json_decode($output, true);
//        dump($url);
        return $output['access_token'];
    }

    public function getJsApiTicket() {
        return $this->doGetJsApiTicket();
    }

    private function doGetJsApiTicket() {
        $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$this->getToken().'&type=jsapi';

        $output = $this->httpGet($url);
        $output = json_decode($output, true);
        if($output['errcode'] == 0) {
            session('jsApiTicket', $output['ticket']);
            session('jsApiTicketTime', NOW_TIME);
            return $output['ticket'];
        }
        else {
            return 'get ticket error';
        }
    }

    private function httpGet($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    //生成随机字符串
    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
}