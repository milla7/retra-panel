<?php 
 ini_set('display_errors', 1);
$directory="assets/clientes/ORDEN-26/Revelado cuadrado/38/";
$path="ORDEN-26/Revelado cuadrado/38/";
	foreach (glob($directory."*") as $foto) {
$filename = $foto;
$filepath = $filename;
$nombre = pathinfo($foto, PATHINFO_FILENAME);
$ex= pathinfo($foto, PATHINFO_EXTENSION); 
$fp = fopen($filename, 'rb');
$size = filesize($filename);
$token = "kGfHUEAG0bMAAAAAAAAAATEfxjtOPFzwMJvMKY99tgN8CSHVE3U_Fn79Q4pGNSve";

	$curl = curl_init("https://content.dropboxapi.com/2/files/upload");
    $curl_headers = ["Authorization: Bearer ".$token,
        "Content-Type: application/octet-stream",
        "Dropbox-API-Arg: {\"path\":\"/$path$nombre.$ex\"}"];
    curl_setopt($curl, CURLOPT_HTTPHEADER,     $curl_headers);
    curl_setopt($curl, CURLOPT_PUT,            true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST,  "POST");
    curl_setopt($curl, CURLOPT_INFILE,         $fp); 
    curl_setopt($curl, CURLOPT_INFILESIZE,     $size);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

echo $response;
curl_close($curl);
fclose($fp);

}