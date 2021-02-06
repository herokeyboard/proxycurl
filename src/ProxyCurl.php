<?php
namespace Herokeyboard;
class ProxyCurl
{
    public static function curl($url, $useragent, $proxy)
    {

    	$response = self::requestCurl($url, $useragent, $proxy);
        return $response;
        
    }
    protected static function requestCurl($url, $useragent, $proxy)
    {  
        $ch = curl_init();       
        curl_setopt($ch, CURLOPT_URL, $url);
        if(isset($proxy)&&$proxy!="")
        {
            $px = explode(':', $proxy);
        }
        else
        {
			$px = explode(':', self::HerokeyboardProxy());
        }
        curl_setopt($ch, CURLOPT_PROXY, $px[0]);
        curl_setopt($ch, CURLOPT_PROXYPORT, $px[1]);
       	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
       	$result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    protected static function HerokeyboardProxy()
    {  

    	$curl = curl_init();
        $s = array(
            CURLOPT_URL => "https://www.sslproxies.org", 
            CURLOPT_REFERER => "https://google.com",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => FALSE,
            CURLOPT_USERAGENT => "AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone",
            CURLOPT_RETURNTRANSFER => TRUE, 
            CURLOPT_FOLLOWLOCATION => TRUE
        );
        curl_setopt_array($curl,$s);
        $response = curl_exec($curl);
        curl_close($curl);
        $regex = '@<td>(.*?)</td>@si';
        preg_match_all($regex,$response,$return);
        $proxyAndPorts = $return[1];
        $proxy = array();
        $port = array();
        $randomProxy = array();
        $sayiFank = array();
        for($i=0; $i < 400; $i+=4) {$proxy[] = $proxyAndPorts[$i];}
        for ($i=1; $i < 400; $i+=4) {$port[] = $proxyAndPorts[$i];}
        $merge = array_merge($proxy,$port);
        for ($i=100; $i < 200; $i++) {$sayiFank[] =  $i;}
        for ($i=0; $i < 99 ; $i++){$randomProxy[] = $merge[$i].":".$merge[$sayiFank[$i]];}
        return $randomProxy[rand(0,5)];
        
    }


}

?>
