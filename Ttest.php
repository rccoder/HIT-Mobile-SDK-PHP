<?php
/**
 * SDK-PHP for mobile HIT
 * 测试 CloudUser
 * @author rccoder <rccoder.net>
 * @date 2015-12-4
 * @version Release 1.0.0
 * @link http://www.rccoder.net
 */
require('CloudUser.php');

class Ttest {
    function __construct() {
        //$json = '{"birthday":-28800000,"enterYear":0,"gender":0,"idsNo":"1130310226","nickName":"段艺","realName":"段艺","sign":{"appKey":"snc-hit","check":"8697f78d6133c57acc4098c1bbc19367da6e6007","nonce":"UofXk1OY","timestamp":1447549447101,"token":"b0ef5091a4eeb41445dba9665cbbd5acf3f7571c"}}';
        $json = '{"avatar":{"id":6772496,"url":"http://file.hit.edu.cn/fs/user-avatar/6772496"},"birthday":-28800000,"dept":{"code":"","name":"计算机科学与技术学院"},"enterYear":0,"gender":0,"idsNo":"1130310226","nickName":"雨翌","qq":"306359430","realName":"段艺","sign":{"appKey":"snc-hit","check":"005f2638045e147c06a2b649ffb0461177199b50","nonce":"0pw2hjHJ","timestamp":1449214774390,"token":"d3e6fae454871e8ca1afbc6283c62ea4142d442b"}}';
        $cu = new CloudUser($json);
        if ($cu->check('appSecret') == 0) {
            echo "验证成功";
        } else {
            echo "验证失败";
        }
    }    
} 

$t = new Ttest();
?>