<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Application specific global variables
class Globals
{
    private static $ClientID = '387697988475-p7rpj8vaoi1r3vj1haagshtp0o8o30cv.apps.googleusercontent.com';
    private static $ClientSecret = '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';
    private static $RedirectUri = 'http://whatisforlunch.com/google';

    public static function getGoogle($redirectUrl = null)
    {
        include_once "vendor/autoload.php";

        $google_client = new Google_Client();

        $google_client->setClientId(self::$ClientID); //Define your ClientID

        $google_client->setClientSecret(self::$ClientSecret); //Define your Client Secret Key

        $google_client->setRedirectUri(self::$RedirectUri); //Define your Redirect Uri

        $google_client->addScope('email');

        $google_client->addScope('profile');

        $google_client->setState($redirectUrl);

        return $google_client;
    }

    public static function getLinkLogin()
    {
        $base_url = rtrim(base_url(),'/');
        $redirectUrl = $base_url.$_SERVER['REQUEST_URI'];
        $google_client = self::getGoogle($redirectUrl);
        return $google_client->createAuthUrl(); 
    }

    public static function saveImagePath($path,$url)
    {
        $context = stream_context_create(
            array(
                "http" => array(
                    'method'=>"GET",
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) 
                                AppleWebKit/537.36 (KHTML, like Gecko) 
                                Chrome/50.0.2661.102 Safari/537.36\r\n" .
                                "accept: text/html,application/xhtml+xml,application/xml;q=0.9,
                                image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3\r\n" .
                                "accept-language: es-ES,es;q=0.9,en;q=0.8,it;q=0.7\r\n" . 
                                "accept-encoding: gzip, deflate, br\r\n"
                )
            )
        );
        file_put_contents($path, file_get_contents($url,false,$context));
    }

    public static function createFileName($userId){
        $fileName = $userId.'-'.date('YmdHis').'.png';
        return $fileName;
    }

    public static function createFilePath($path,$userId=null){
        if ($userId) {
            $fileName = self::createFileName($userId);
        }
        $filePath = $path.$fileName;
        return $filePath;
    }

    public static function createFolder($nameFolder)
    {
        $folder = 'images/'.$nameFolder.'/';
        if (!file_exists($folder)) {
            mkdir($folder, 0777,true);
        }
    }

    public static function saveAvatarUser($userId,$url){
        $folder = self::createFolder('avatar');
        $path = 'images/avatar/'.date('Ym').'/';
        if (!file_exists($path)) {
            mkdir($path, 0777,true);
        }
        $filePath = self::createFilePath($path,$userId);
        self::saveImagePath($filePath,$url);
        return $filePath;
    }

    public static function getNumber($str) {
        preg_match_all('/\d+/', $str, $matches);
        return $matches[0];
    }

    public static function convertSlug($title)
    {
        $replacement = '-';
        $map = array();
        $quotedReplacement = preg_quote($replacement, '/');
        $default = array(
            '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
            '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
            '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
            '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
            '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
            '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
            '/đ|Đ/' => 'd',
            '/ç/' => 'c',
            '/ñ/' => 'n',
            '/ä|æ/' => 'ae',
            '/ö/' => 'oe',
            '/ü/' => 'ue',
            '/Ä/' => 'Ae',
            '/Ü/' => 'Ue',
            '/Ö/' => 'Oe',
            '/ß/' => 'ss',
            '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
            '/\\s+/' => $replacement,
            sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
        );
        //Some URL was encode, decode first
        $title = urldecode($title);
        $map = array_merge($map, $default);
        return strtolower(preg_replace(array_keys($map), array_values($map), $title));
    }

    public static function checkLogin()
    {
        if(isset($_COOKIE['user_id'])){
            $user_id = $_COOKIE['user_id'];
            $user_email = $_COOKIE['user_email'];
            $CI = get_instance();
            // You may need to load the model if it hasn't been pre-loaded
            $CI->load->model('site_model');
            $data = $CI->site_model->checkUser('user',['id'=>$user_id,'email'=>$user_email])->row();
            $user = [
                'id'	=> $data->id,
                'username' => $data->username,
                'avatar'	=> $data->avatar,
                'active'=> 1,
            ];
            $_SESSION['user'] = $user;
        }
    }

    public static function setCookie($name,$value,$exprire=null)
    {
		$exprire =$exprire ? $exprire : 86400 * 30;
		setcookie($name,$value,$exprire);
    }

    public static function unsetCookie($name){
        if(is_array($name)){
            foreach($name as $value){
                setcookie($value, '', time() - 3600, '/');
            }
        }else{
            setcookie($name, '', time() - 3600, '/');
        }
    }

}