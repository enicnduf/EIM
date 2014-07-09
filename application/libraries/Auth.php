<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth {
    var $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->helper('url');
    }

    /*
      this checks to see if the admin is logged in
      we can provide a link to redirect to, and for the login page, we have $default_redirect,
      this way we can check if they are already logged in, but we won't get stuck in an infinite loop if it returns false.
     */

    function is_logged_in() {
        //check the cookie
        if ($this->CI->input->cookie('eim_user')) {
            //the cookie is there, lets log the customer back in.
            $info = $this->authcode($this->CI->input->cookie('eim_user'));
            $cookie = json_decode($info, true);

            if (is_array($cookie) && !empty($cookie)) {
				$this->generateCookie('eim_user', $this->CI->input->cookie('eim_user'), 1800);
                return $cookie;
            }
			else{
				return false;
			}
        }else{
			return false;
		}
    }

    function is_admin() {
        //check the cookie
        $info = $this->authcode($this->CI->input->cookie('eim_user'));
        if ($info) {
            //the cookie is there, lets log the customer back in.
            $info = $this->authcode($info);
            $cookie = json_decode($info, true);

            if (is_array($cookie) && $cookie['role']=='1111') {
				return true;
            }
			else{
				return false;
			}
        }else{
			return false;
		}
    }

    function generateCookie($cookie_name, $data, $expire)
    {
		$prefix = config_item('cookie_prefix');
		$path = config_item('cookie_path');
		$domain = config_item('cookie_domain');
		$this->CI->input->set_cookie($cookie_name, $data, $expire, $domain, $path, $prefix);
        //setcookie($cname, $data, $expire, '/', $domain);
    }

    function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0) {
         // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
        $ckey_length = 4;   // 随机密钥长度 取值 0-32;
                    // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
                    // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
                    // 当此值为 0 时，则不产生随机密钥
        // 密匙
        $key = md5($key ? $key : config_item('encryption_key'));
        // 密匙a会参与加解密
        $keya = md5(substr($key, 0, 16));
        // 密匙b会用来做数据完整性验证
        $keyb = md5(substr($key, 16, 16));
        // 密匙c用于变化生成的密文
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
        // 参与运算的密匙
        $cryptkey = $keya.md5($keya.$keyc);
        $key_length = strlen($cryptkey);   
    
        // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，解密时会通过这个密匙验证数据完整性
        // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
        $string_length = strlen($string);   
     
        $result = '';
        $box = range(0, 255);   
     
        $rndkey = array();
        // 产生密匙簿
        for($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
         }
         // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度
        for($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }
        // 核心加解密部分
        for($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            // 从密匙簿得出密匙进行异或，再转成字符
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
         }   
     
        if($operation == 'DECODE') {
            // 验证数据有效性，请看未加密明文的格式
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
                return substr($result, 26);
             } else {
                return '';
                 }
         } else {
             // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
             // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码
            return $keyc.str_replace('=', '', base64_encode($result));
         }
    }

	
	    /*
    this function does the logging out
    */
    function logout()
    {
        //force expire the cookie
        $this->generateCookie('eim_user','[]', time()-3600);
    }

    function admin_logout()
    {
        //force expire the cookie
        $this->generateCookie('eim_admin','[]', time()-3600);
    }
}