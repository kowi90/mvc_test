<?php


namespace Lib;
/**
* 
*/
abstract class Helper
{

	public static function startsWidth($string, $start)
	{
		return (strpos($string, $start) === 0);
	}

	public static function removeFrom($string, $remove)
	{
		return str_replace($remove, '', $string);
	}

	//alias létrehozása: pl : "Helló hahó" => "hello_haho"
	public static function createAlias($string)
	{
		$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
		
		$string = strtr( $string, $unwanted_array );
		$string = strtr( $string, ' ', '_' );
		$string = strtolower($string);

		return $string;
	}

	public static function addCSS($filename)
	{
		echo '<link rel="stylesheet" type="text/css" href="'.__CSS__.'/'.$filename.'.css">';
	
	}
	public static function addJS($filename)
	{
		echo '<script src="'.__JS__.'/'.$filename.'.js"></script>';
	}

	public static function getIP()
	{
		return $_SERVER['REMOTE_ADDR'];
	}

	public static function getBrowser()
	{
	
	$u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Other';
    
 
    if(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $u_agent )) 
    { 
        $bname = 'Mobile'; 
        $ub = "Safari"; 
    }  


    return $bname; 
	}

}