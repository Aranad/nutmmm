 <!DOCTYPE html>
<html>
<body>

<?php
//$url = urlencode("http://xyz.com/api?apikey=foo&v1=bar&v2=baz");
/*$url = "https://monerodice.net/api/betStats?public_key=CfVBTe3aAEV2YDThBXpzmB3mPKnM3lCu&private_key=Lfj1Hi3Vqr297R98o7xlOC3Qac7CT8Yz&input_limit=1";
$response = file_get_contents($url);

echo $response;*/

/*$url = 'http://monerodice.net/api/betStats';
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

	echo $result;
if ($result === FALSE) {  }

var_dump($result);*/

//$url = 'http://monerodice.net/api/betStats';
$url = 'https://games.bitcoin.com/account/balance?account_key=7f06f8e1257cc0b5a04d5dffc1689c73';
//$myvars = "public_key=CfVBTe3aAEV2YDThBXpzmB3mPKnM3lCu& private_key=Lfj1Hi3Vqr297R98o7xlOC3Qac7CT8Yz& input_limit=1";
//$myvars = "account_key=7f06f8e1257cc0b5a04d5dffc1689c73";

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
//curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );

echo $response;
?>

</body>
</html> 
