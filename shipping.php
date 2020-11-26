<?php
 $url = $_POST["email"];
 echo json_encode([
    "parsed" => $url
]);
?>
