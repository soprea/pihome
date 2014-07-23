<?

function get_db_table($data) {
	global $config;
	return "".$config['prefix']."".$data."";
}


function get_date() {
	$now=date("d.m.Y, H:i:s",time());
	return $now;
}


function getCutStrip($cs,$ml,$end){
	$cutstrip = $cs;
	$maxlaenge = $ml;
	$cutstrip = (strlen($cutstrip) > $maxlaenge) ? substr($cutstrip,0,$maxlaenge).$end : $cutstrip;
	return $cutstrip;
}

function dbconnect(){
    global $config;
	if (!($link = mysql_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PWD']))){
        print "<h3>could not connect to database</h3>\n";
		exit;
	}
	mysql_select_db($config['DB_NAME'], $link) or die ('Could not select database');
    return $link;
}

function getcopy(){
	return '<a href="http://" target="_blank" title="PiHome">PiHome</a> &#169; '.date('Y');
}

function getLights(){
	dbconnect();
	$sql_getLights       = "SELECT * FROM  pi_devices  WHERE aktiv = '1' ORDER BY sort DESC ";
	$query_getLights     = mysql_query($sql_getLights);	
	$x=0;
	while($light = mysql_fetch_assoc($query_getLights)){
		$devices[$x]["id"] = $light['id'];
		$devices[$x]["room_id"] = $light['room_id'];
		$devices[$x]["device"] = $light['device'];
		$devices[$x]["letter"] = $light['letter'];
		$devices[$x]["code"] = $light['code'];
		$devices[$x]["status"] = $light['status'];
		$devices[$x]["type"] = $light['type'];
		$x=$x+1;
	}
	return $devices;
}

//function getLightsByRoomID($id){
//        dbconnect();
function getLightsByRoomID(){
        dbconnect();
        $sql_getLights       = "SELECT * FROM  pi_devices  WHERE room_id = '1' ORDER BY sort DESC ";
        $query_getLights     = mysql_query($sql_getLights);
        $x=0;
        while($light = mysql_fetch_assoc($query_getLights)){
                $device[$x]["id"] = $light['id'];
                $device[$x]["room_id"] = $light['room_id'];
                $device[$x]["device"] = $light['device'];
                $device[$x]["letter"] = $light['letter'];
                $device[$x]["code"] = $light['code'];
                $device[$x]["status"] = $light['status'];
                $device[$x]["type"] = $light['type'];
                $x=$x+1;
        }
        return $device;
}

function getEvents(){
	dbconnect();
	$sql_getEvents       = "SELECT * FROM  pi_events  WHERE aktiv = '1' LIMIT 25";
	$query_getEvents     = mysql_query($sql_getEvents);	
	$x=0;
	while($event = mysql_fetch_assoc($query_getEvents)){
		$events[$x]["id"] = $event['id'];
		$events[$x]["date"] = $event['date'];
		$events[$x]["room_id"] = $event['room_id'];
		$events[$x]["device"] = $event['device'];
		$events[$x]["code"] = $event['code'];
		$events[$x]["status"] = $event['status'];
		$events[$x]["type"] = $event['type'];
		$x=$x+1;
	}
	return $events;
}

function getRoomById($id){
	dbconnect();
	$sql_getroom       = "SELECT * FROM  pi_rooms  WHERE id = '".$id."' ";
	$query_getroom      = mysql_query($sql_getroom);
	while($getroom  = mysql_fetch_assoc($query_getroom)){
		return $getroom['room'];
	}
}

function getRooms(){
        dbconnect();
        $sql_getRooms       = "SELECT * FROM  pi_rooms";
        $query_getRooms     = mysql_query($sql_getRooms);
        $x=0;
        while($room = mysql_fetch_assoc($query_getRooms)){
                $rooms[$x]["id"] = $room['id'];
                $rooms[$x]["room"] = $room['room'];
                $x=$x+1;
        }
        return $rooms;
}

function setLightStatus($id,$status){
	dbconnect();
	$sql_light       = "SELECT * FROM  pi_devices  WHERE id = '".$id."' ";
	$query_light      = mysql_query($sql_light);
	while($light  = mysql_fetch_assoc($query_light)){
	$ls = $light['status'];
	}
	if($status=="on"){ $s="1"; }elseif($status=="off"){ $s="0"; }	
	if($s!=$ls){	
		dbconnect();
		$sql_status_update = "UPDATE `pi_devices` SET `status`='".$s."' WHERE `id`='".$id."'";
		mysql_query($sql_status_update);
	}
}

function getCodeById($id){
	dbconnect();
	$sql_getcode       = "SELECT * FROM  pi_devices  WHERE id = '".$id."' ";
	$query_getcode      = mysql_query($sql_getcode);
	while($code  = mysql_fetch_assoc($query_getcode)){
		$c["letter"] = $code['letter'];
		$c["code"] = $code['code'];
	}
	return $c;
}

function allOff(){
	dbconnect();
	$sql_alloff = "SELECT * FROM pi_devices WHERE status = 1 ";
	$query_alloff = mysql_query($sql_alloff);
	while($getallon = mysql_fetch_assoc($query_alloff)){
		$stat="off";
		#echo $getallon["id"]."  ".$getallon['letter']."  ".$getallon['code']."<br>";
		setLightStatus($getallon["id"],$stat);
		file_get_contents("http://localhost:8888/request/".$getallon['letter']."/".$stat."/".$getallon['code']);
	}
}
?>
