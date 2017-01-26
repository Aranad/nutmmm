 <!DOCTYPE html>
<html>
<body>

<?php
//$url = urlencode("http://xyz.com/api?apikey=foo&v1=bar&v2=baz");
/*$url = "https://monerodice.net/api/betStats?public_key=CfVBTe3aAEV2YDThBXpzmB3mPKnM3lCu&private_key=Lfj1Hi3Vqr297R98o7xlOC3Qac7CT8Yz&input_limit=1";
$response = file_get_contents($url);

echo $response;*/

$url = 'http://monerodice.net/api/betStats';
=&=&=1
$data = array('public_key' => 'CfVBTe3aAEV2YDThBXpzmB3mPKnM3lCu', 'private_key' => 'Lfj1Hi3Vqr297R98o7xlOC3Qac7CT8Yz', 'input_limit' => '1');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }
else{
	echo $result;
}

var_dump($result);
?>

</body>
</html> 
