<?php

$urlerror = null; $name= ""; $urlok = "";
$brand = "";

$url = ""; 
  $parse = "";
// Use parse_url() function to parse the URL 
// $parse = var_dump(parse_url($url)); 
$urls= array ("https://www.amazon.co.uk/");
// echo $parse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
if (empty($_POST["url"])) {
    $urlerror = "Url is required";
    $brand = $_POST["brand"];
} else {
    $url = $_POST["url"];
    $brand = $_POST["brand"];
    $parse = parse_url($urls[0], PHP_URL_HOST); 
    $parse2 = parse_url($url, PHP_URL_HOST);
    if($parse == $parse2){
        $urlok = "Okay";
    }
}}
echo json_encode([
    "urlerror" => $urlerror,
    "parsed" => $urlok,
    "brand" => $brand

]);
// // if(empty($errorMSG)){
// // 	$msg = "Name: ".$name ;
// // 	echo json_encode(['code'=>200, 'msg'=>$msg]);
// // 	exit;
// // }
// echo $ ? "OK" : $error ;
?>