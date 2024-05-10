<?php

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection 
    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";
$amount = "10000";
$orderId = time() . "";
$orderId = "1516771499398";
$redirectUrl = "http://localhost/Duanmot/index.php?controller=checkOut";
$ipnUrl = "http://localhost/Duanmot/index.php?controller=checkOut";
$extraData = "";



$partnerCode = $partnerCode;
$accessKey = $accessKey;
$serectkey = $secretKey;
$orderId = time() . ""; // Mã đơn hàng
$orderInfo = $orderInfo;
$amount = "100000";
$ipnUrl = $ipnUrl;
$redirectUrl = $redirectUrl;
$extraData = $extraData;

$requestId = time() . "";
$requestType = "payWithATM";
// $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
//before sign HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $serectkey);

$data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature
);
$result = execPostRequest($endpoint, json_encode($data));
var_dump($result);
$jsonResult = json_decode($result, true);  // decode json
var_dump($jsonResult['payUrl']);
//Just a example, please check more in there
// header('Location: ' . 'https://test-payment.momo.vn/v2/gateway/pay?t=TU9NT0JLVU4yMDE4MDUyOXwxNzAyMjgzMDA4&s=919764e3ae97d6485b7f58bcc749a243ecc7fa03780c4a7e5eb871c6044fa95b');
header('Location: ' . $jsonResult['payUrl']);
