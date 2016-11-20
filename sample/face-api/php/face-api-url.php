<?php

$endpoint = 'https://api.projectoxford.ai/face/v1.0/detect';
// $endpoint = 'http://google.com/';
$headers = [
	'Content-Type: application/json',
	'Ocp-Apim-Subscription-Key: <your subscription key>'
];

$url = $_POST['url'];
$params = json_encode(['url' => $url]);

var_dump($params);
echo '<br>';
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	// 画面に表示させず文字列で結果を受け取る
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE); 
$body = substr($response, $header_size);

curl_close($ch);

var_dump($httpcode);
echo '<br>';
if ($httpcode == 200) {
	var_dump($response);
}
else {
	var_dump($httpcode);
	var_dump($response);
}
