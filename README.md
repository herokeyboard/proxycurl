# Proxy Curl
## Installation

```
composer require herokeyboard/proxycurl:dev-main
```

## Usage

```php
require_once ('vendor/autoload.php');
use \Herokeyboard\ProxyCurl;
$curl = new ProxyCurl();
$link ="https://ipinfo.io/json";

$agent="AndroidTranslate/5.3.0.RC02.130475354-53000263 5.1 phone TRANSLATE_OPM5_TEST_1";

//$proxy = "";// auto proxy
//$result = $curl->curl($link,$agent, $proxy);
//print_r($result);


$proxy = "104.248.123.76:18080";//set proxy
$result = $curl->curl($link,$agent, $proxy);
print_r($result);
```
