<?
require('../configs/dbconfig.inc.php');
require('configs/functions.inc.php');

$wid = $_GET["w"];
$opp =  $_GET['o'];

if($opp=="device"){
dbconnect();
$sql_work_data    = "SELECT * FROM pi_devices WHERE id = ".$wid;
$query_work_data  = mysql_query($sql_work_data);
while($workdata   = mysql_fetch_assoc($query_work_data)){
?>
<form id="formdevice" method="post"><br>Active:<br>
	<select name="waktiv">
		<? if($workdata['aktiv']=="0"){ ?>
		<option value="0">disable</option>
		<option value="1">enable</option>
		<? }else{ ?>
		<option value="1">enable</option>
		<option value="0">disable</option>		
		<? } ?>

	</select>
	<br><br>
	Device Name:<br>
	<input type="text" name="wdevice_name" value="<?=utf8_encode($workdata['device'])?>">
	<br><br>
	Room:<br>
	<select name="wroom_id">
		<? 
		$ro=getRooms();
		for($x=0;$x<count($ro);$x++){	
			if($ro[$x]["id"]==$workdata['room_id']){	
				echo '<option value="'.$ro[$x]["id"].'" selected>'.utf8_encode($ro[$x]["room"]).'</option>';
			}else{
				echo '<option value="'.$ro[$x]["id"].'">'.utf8_encode($ro[$x]["room"]).'</option>';
			}
		} 
		?>
	</select>
	<br><br>
	Letter:<br>
	<? $letters=array("A","B","C","D") ?>
	<select name="wletter">		
		<? for($le=0;$le<count($letters);$le++){ 
			if($letters[$le]==$workdata['letter']){
		?>
			<option value="<?=$letters[$le]?>" selected><?=$letters[$le]?></option>
		<? }else{ ?>
			<option value="<?=$letters[$le]?>"><?=$letters[$le]?></option>
		<? } } ?>
	</select>
	<br><br>
			Type:<br>
			<select name="type">
				<option value="light">light</option>
				<option value="temp">temp</option>
			</select>
	<br><br>
                        Code:<br>
                        <select name="c1">
                                <option value="p">p</option>
                                <option value="i">i</option>
                        </select>
                        <select name="c2">
                                <option value="i">i</option>
                                <option value="n">n</option>
                        </select>
                        <select name="c3">
                                <option value="n">n</option>
                                <option value="p">p</option>
                        </select>
                        <select name="c4">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                        </select>
                        <select name="c5">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                        </select>
                        <select name="c6">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
			</select>
	<br><br>				
	Sort:<br>
	<input type="text" name="wsort" size="10" value="<?=$workdata['sort'];?>">				
	<br><br>				
	<span class="submit"><input type="button" onclick="update_device_send(<?=$workdata['id'];?>)" value="Update device"></span>	
</form>
<?
	}
}elseif($opp=="room"){
dbconnect();
$sql_work_room    = "SELECT * FROM pi_rooms WHERE id = ".$wid;
$query_work_room  = mysql_query($sql_work_room);
while($workroom   = mysql_fetch_assoc($query_work_room)){
?>
<form method="post" id="formroom">
	Room Name:<br>
	<input type="text" name="wroom" value="<?=utf8_encode($workroom['room']);?>">
	<br><br>
	<span class="submit"><input type="button" onclick="update_room_send(<?=$workroom['id']?>);" value="Update room"></span>
</form>
<?
		}
	}
?>
