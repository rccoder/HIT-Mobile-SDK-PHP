<?php
/**
 * SDK-PHP for mobile HIT
 * 使用方法见Ttest.php
 * @author rccoder <rccoder.net@gmail.com>
 * @date 2015-12-4
 * @version Release 1.1.0
 * @link http://www.rccoder.net
 */

class CloudUser
{
    private $idsNo;
    private $nickName;
    private $realName;
    private $avatar;
    private $gender;
    private $enterYear;
    private $birthday;
    private $region;
    private $dept;
    private $major;
    private $qq;

    private $sign;


    public function __construct($json_string) {
        $data_object = json_decode($json_string);

        $this->idsNo = $this->exitsOrNull($data_object, "idsNo");
        $this->nickName = $this->exitsOrNull($data_object, "nickName");
        $this->realName = $this->exitsOrNull($data_object, "realName");

        $this->avatar = $this->exitsOrNull($data_object, "avatar");

        if($this->avatar != "<null>") {
            $this->avatar->id = $data_object->avatar->id;
            $this->avatar->url = $data_object->avatar->url;
        }

        $this->gender = $this->exitsOrNull($data_object, "gender");
        $this->enterYear = $this->exitsOrNull($data_object, "enterYear");
        $this->birthday = $this->exitsOrNull($data_object, "birthday");
        $this->region = $this->exitsOrNull($data_object, "region");

        $this->dept = $this->exitsOrNull($data_object, "dept");

        if($this->dept != "<null>") {
            $this->dept->name = $data_object->dept->name;
            $this->dept->code = $data_object->dept->code;
        }

        $this->major = $this->exitsOrNull($data_object, "major");
        $this->qq = $this->exitsOrNull($data_object, "qq");

        $this->sign->token = $data_object->sign->token;
        $this->sign->appKey = $data_object->sign->appKey;
        $this->sign->nonce = $data_object->sign->nonce;
        $this->sign->timestamp = $data_object->sign->timestamp;
        $this->sign->check = $data_object->sign->check;

    }

    private function exitsOrNull($object, $key) {
        if(property_exists($object, $key)) {
            return $object->$key;
        } else {
            return "<null>";
        }
    }

    public function check($appSecret) {
        return strcmp($this->sign->check, $this->shaHex($appSecret));
    }


    private function avatarToString() {
        if($this->avatar != "<null>") {
            return ",avatar=CloudUser.File[id=".$this->avatar->id.",url=".$this->avatar->url."]";
        } else {
            return ",avatar=<null>";
        }
    }

    private function deptToString() {
        if($this->dept != "<null>") {
            return ",dept=CloudUser.Item[code=".$this->dept->code.",name=".$this->dept->name."]";    
        } else {
            return ",dept=<null>";
        }
        
    }

    private function signToString() {
        if($this->sign != "<null>") {
            return ",sign=CloudUser.Signature[token=".$this->sign->token.",appKey=".$this->sign->appKey.",nonce=".$this->sign->nonce.",timestamp=".$this->sign->timestamp."]";
        } else {
            return ",sign=<null>";
        }
    }

    private function toString() {
        $str = "";
        $str .= "CloudUser[idsNo=".$this->idsNo.",nickName=".$this->nickName.",realName=".$this->realName;
        $str .= $this->avatarToString();
        $str .= ",gender=".$this->gender.",enterYear=".$this->enterYear.",birthday=".$this->birthday.",region=".$this->region;
        $str .= $this->deptToString();
        $str .= ",major=".$this->major.",qq=".$this->qq;
        $str .= $this->signToString();
        $str .= "]";
        return $str;
    }

    private function shaHex($appSecret) {
        $t = $this->toString();

        echo $t;
        return sha1($t.$appSecret);
    }
 }
?>