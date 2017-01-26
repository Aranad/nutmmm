 <!DOCTYPE html>
<html>
<body>

<?php
//$url = urlencode("http://xyz.com/api?apikey=foo&v1=bar&v2=baz");
$url = "https://monerodice.net/api/betStats?public_key=CfVBTe3aAEV2YDThBXpzmB3mPKnM3lCu&private_key=Lfj1Hi3Vqr297R98o7xlOC3Qac7CT8Yz&input_limit=1";
$response = file_get_contents($url);

echo $response;
?>

</body>
</html> 
