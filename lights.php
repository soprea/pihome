<?

include("configs/dbconfig.inc.php");
include("configs/functions.inc.php");
?>


<ul>
<?
$lp=getLights();
for($i=0;$i<count($lp);$i++){
if($lp[$i]["status"]=="0"){ $lampimg = "lamp_off.png"; $btn1 = "on_off.png"; $btn2 = "off_on.png"; }
elseif($lp[$i]["status"]=="1"){ $lampimg = "lamp_on.png"; $btn1 = "on_on.png"; $btn2 = "off_off.png"; }
if($lp[$i]["type"]=="switch"){
?>	
	<li>
		<div class="switch">
			<div class="lamp"><img src="images/<?=$lampimg;?>" border="0" id="lamp_<?=$lp[$i]["id"];?>"></div>
			<div class="name"><div class="device"><?=utf8_encode($lp[$i]["device"]);?></div><div class="room"><?=utf8_encode(getRoomById($lp[$i]["room_id"]));?></div></div>
			<div class="btn">
				<span><a href="javascript:ac('<?=$lp[$i]["id"];?>_on');"><img id="btn1_<?=$lp[$i]["id"];?>" src="images/<?=$btn1;?>" border="0"></a></span><span><a href="javascript:ac('<?=$lp[$i]["id"];?>_off');"><img id="btn2_<?=$lp[$i]["id"];?>" src="images/<?=$btn2;?>" border="0"></a></span>
			</div>
		</div>
	</li>
<?
	}

elseif($lp[$i]["type"]=="sensor"){
  $sensor = $lp[$i]["status"];
  if ($sensor[0] == "-"){$sensorimg = "cold.png";}elseif ($sensor[0] !== "-"){$sensorimg = "hot.png";}
     ?>      
       <li>
          <div class="switch">
            <div class="lamp"><img src="images/<?=$sensorimg?>" border="0" id="lamp_<?=$lp[$i]["id"];?>"></div>
            <div class="name"><div class="device"><?=utf8_encode($lp[$i]["device"]);?></div><div class="room"><?=utf8_encode(getRoomById($lp[$i]["room_id"]));?></div></div>
            <div class="btn"><?=$sensor;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          </div>
       </li>
<?
	}
}
?>	
</ul>
