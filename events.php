<?

include("configs/dbconfig.inc.php");
include("configs/functions.inc.php");
?>


<ul>
<?
$lp=getEvents();
for($i=0;$i<count($lp);$i++){
if($lp[$i]["status"]=="0"){ $lampimg = "lamp_off.png"; $btn1 = "on_off.png"; }
elseif($lp[$i]["status"]=="1"){ $lampimg = "lamp_on.png"; $btn1 = "on_on.png"; }
if($lp[$i]["type"]=="light"){
?>	
	<li>
		<div class="light">
			<div class="lamp"><img src="images/<?=$lampimg;?>" border="0" id="lamp_<?=$lp[$i]["id"];?>"></div>
			<div class="name"><div class="device"><?=utf8_encode($lp[$i]["device"]);?></div>
	    <div class="room"><?=utf8_encode(getRoomById($lp[$i]["room_id"]));?><center><?=utf8_encode($lp[$i]["date"]);?></center></div></div>
			<div class="btn">
				<span><a href="javascript:ac('<?=$lp[$i]["id"];?>_on');"><img id="btn1_<?=$lp[$i]["id"];?>" src="images/<?=$btn1;?>" border="0"></a></span>
			</div>
		</div>
	</li>
<?
	}

elseif($lp[$i]["type"]=="temp"){
  $temp = $lp[$i]["status"];
  if ($temp[0] == "-"){$tempimg = "cold.png";}elseif ($temp[0] !== "-"){$tempimg = "hot.png";}
     ?>      
       <li>
          <div class="light">
            <div class="lamp"><img src="images/<?=$tempimg?>" border="0" id="lamp_<?=$lp[$i]["id"];?>"></div>
            <div class="name"><div class="device"><?=utf8_encode($lp[$i]["device"]);?></div>
	    <div class="room"><?=utf8_encode(getRoomById($lp[$i]["room_id"]));?><center><?=utf8_encode($lp[$i]["date"]);?></center></div></div>
            <div class="btn"><?=$temp;?>&nbsp;&nbsp;</div>
          </div>
       </li>
<?
	}
}
?>	
</ul>
