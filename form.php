<?php

$name = "";
$url_check = "";
$brand = "";

$url = "";
$parse = $parse2 = "";

// Use parse_url() function to parse the URL 
// $parse = var_dump(parse_url($url)); 
$urls = array("https://www.amazon.co.uk/", "https://www.aldoshoes.com/uk/en_UK");

$url_uk_domain = array("https://www.adidas.co.uk/", "https://www.amazon.co.uk/", "https://www.clarks.co.uk/", "https://www.gap.co.uk/", "https://www.next.co.uk/", "https://www.ralphlauren.co.uk/", "https://www.reebok.co.uk/", "https://www.zalando.co.uk/", "https://www.underarmour.co.uk/en-gb/");
$url_global_domain = array("https://www.asos.com/", "https://www.boohoo.com/", "https://www.debenhams.com/", "https://www.dunelondon.com/", "https://www.marksandspencer.com/", "https://www.riverisland.com/", "https://www.sportsdirect.com/", "https://www.topshop.com/", "https://www.boots.com/mothercare");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["url"]) || empty($_POST["brand"])) {
        $url_check = "Url  or brand name has error";
    } else {
        $url = $_POST["url"];
        $brand = $_POST["brand"];
        if ($brand > 20 && $brand <= 29) {
            $brand_mod =  $brand % 10 - 1;
            $parse = parse_url($url_uk_domain[$brand_mod], PHP_URL_HOST);
            $parse2 = parse_url($url, PHP_URL_HOST);
            // echo $parse;
            // echo $parse2;
        } else if ($brand > 30 && $brand <= 39) {
            $brand_mod =  $brand % 10 - 1;
            $parse = parse_url($url_global_domain[$brand_mod], PHP_URL_HOST);
            $parse2 = parse_url($url, PHP_URL_HOST);
            echo $parse;
            echo $parse2;
        } else {
            $url_new = "https://www.aldoshoes.com/uk/en_UK";
            $parse = parse_url($url_new, PHP_URL_PATH);

            $parse2 =  parse_url($url, PHP_URL_PATH);
            $str = "Visit W3Schools";
            $pattern = array("/uk/","/gb/","/en_gb/","/en-gb/","/GB/","/en_gbp/");
            $pattern2 ="/en_UK/";
           
            for ($x = 0; $x < sizeof($pattern); $x++) {
                $oo= preg_match($pattern[$x], $parse2);
                if($oo == 1){
                    echo $oo;
                }

              }
           
           
            print_r($oo);
          
            // echo $oo;
            // print_r($matches);
        }

        if ($parse == $parse2) {
            $url_check = "Okay";
        } else {
            $url_check = "URL has an issue";
        }
    }
}
echo json_encode([
    // "urlerror" => $urlerror,
    "parsed" => $url_check,
    "brand" => $brand,
    "urlcheck" => $url_check
]);
// // if(empty($errorMSG)){
// // 	$msg = "Name: ".$name ;
// // 	echo json_encode(['code'=>200, 'msg'=>$msg]);
// // 	exit;
// // }
// echo $ ? "OK" : $error ;
