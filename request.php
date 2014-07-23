<?
include("configs/dbconfig.inc.php");
include("configs/functions.inc.php");

$value = $_GET["s"];

if($_GET["s"]){

	$cutvalue=explode("_", $value);
	$lid  = $cutvalue[0];
	$stat = $cutvalue[1];

	setLightStatus($lid,$stat);
	$code = getCodeById($lid);
	$code_needed = $code['code'];

	#exec("echo 'klick ".$lid." ".$stat." ".$code['letter']." ".$code['code']."' >> klick.txt  ");
	#exec("echo 'klick ".$stat.$code['code']."' >> klick.txt  ");

	#file_get_contents("http://localhost:8888/request/".$code['letter']."/".$stat."/".$code['code']);
	#exec("echo '/var/www/pi/arduino-serial/arduino-serial -b 115200 -p /dev/ttyACM0 -s ".$stat.$code['code']." -r' >> output");
	exec("/var/www/pi/arduino-serial/arduino-serial -b 115200 -p /dev/ttyACM2 -S {$stat}{$code_needed} -r -w");

}
?>
