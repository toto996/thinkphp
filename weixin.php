<?php
/**
 * Created by PhpStorm.
 * User: ToTo
 * Date: 2015/10/25
 * Time: 22:26
 */
// ���PHP����
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// ��������ģʽ ���鿪���׶ο��� ����׶�ע�ͻ�����Ϊfalse
define('APP_DEBUG',True);

// ����Ӧ��Ŀ¼
define('APP_PATH','./Application/');
define('BIND_MODULE','Weixin');

// ����ThinkPHP����ļ�
require './ThinkPHP/ThinkPHP.php';