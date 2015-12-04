哈尔滨工业大学移动平台身份认证SDK(PHP)
===
## 概述
项目根据原有Java版SDK反编译代码编写。

## 使用说明
```php
<?php
/**
 * SDK-PHP for mobile HIT
 * 测试 CloundUser
 * @author rccoder <rccoder.net>
 * @date 2015-12-4
 * @version Release 1.0.0
 * @link http://www.rccoder.net
 */
require('CloudUser.php');

class Ttest {
    function __construct() {
        $json = '{"birthday":-28800000,"enterYear":0,"gender":0,"idsNo":"1130310226","nickName":"段艺","realName":"段艺","sign":{"appKey":"snc-hit","check":"8697f78d6133c57acc4098c1bbc19367da6e6007","nonce":"UofXk1OY","timestamp":1447549447101,"token":"b0ef5091a4eeb41445dba9665cbbd5acf3f7571c"}}';

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
```

实例化成对象之后调用check方法，参数`appSecret`是学校的密钥，返回值是0的情况下说明验证通过。