<?php
/*curl "https://api.scalablepress.com/v2/quote" \
  -u ":93f6315847d935efb4244f5347d899c0" \
  -d "type=dtg" \
  -d "sides[front]=1" \
  -d "products[0][id]=gildan-sweatshirt-crew" \
  -d "products[0][color]=ash" \
  -d "products[0][quantity]=12" \
  -d "products[0][size]=lrg" \
  -d "address[name]=Jo Schmo" \
  -d "address[address1]=123 Scalable Drive" \
  -d "address[city]=West Pressfield" \
  -d "address[state]=CA" \
  -d "address[zip]=12345" \
  -d "designId=53ed3a23b3730f0e27a66513" */


##### features

if(isset($_POST['type'])){
	$type = $_POST['type'];
}
if(isset($_POST['id'])){
	$id = $_POST['id'];
}
if(isset($_POST['color'])){
	$color = $_POST['color'];
}
if(isset($_POST['quantity'])){
	$designID = $_POST['quantity'];
}
if(isset($_POST['size'])){
	$size = $_POST['size'];
}
if(isset($_POST['designId'])){
	$designId = $_POST['designId'];
}




###### API request

$url = "https://api.scalablepress.com/v2/quote";
/*$url = $url . "type=dtg";
$url = $url . "&sides[front]=1";
$url = $url . "&products[0][id]=gildan-sweatshirt-crew";
$url = $url . "&products[0][color]=ash";
$url = $url . "&products[0][quantity]=12";
$url = $url . "&products[0][size]=lrg";
$url = $url . "&address[name]=Jo Schmo";
$url = $url . "&address[address1]=123 Scalable Drive";
$url = $url . "&address[city]=West Pressfield";
$url = $url . "&address[state]=CA";
$url = $url . "&address[zip]=12345";
$url = $url . "&designId=53ed3a23b3730f0e27a66513";
*/

$data = array(
	"type" => $type,
    "sides[front]" => "1",
    "products[0][id]" => $id,
    "products[0][color]" => "ash",
    "products[0][quantity]" => "12",
    "products[0][size]" => $size,
    "address[name]" => "Jo Schmo",
    "address[address1]" => "123 Scalable Drive",
    "address[city]" => "West Pressfield",
    "address[state]" => "CA",
    "address[zip]" => "12345",
    "designId" => $designId
  );

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_USERPWD, ':93f6315847d935efb4244f5347d899c0');
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
curl_close($ch); 
$json_obj = json_decode($response, true);

echo $json_obj;



?>