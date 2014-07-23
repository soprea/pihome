<?
include("configs/dbconfig.inc.php");
include("configs/functions.inc.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<meta name="viewport" content="width=device-width, user-scalable=no" /> 
	<meta name="format-detection" content="telephone=yes">
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png"/>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/request.js"></script>
	<script type="text/javascript" src="js/tabcontent.js"></script>
	<title>PiHome</title>
	<script type="text/javascript">
	 $(document).ready(function() {	 	
	    $('#lights').load('lights.php');
	    $('#events').load('events.php');
	 });	 
	</script>
</head>
<body>
<div id="nav">
	<span><img src="images/pihome.png" id="home" border="0"></span>
	<span><img src="images/spacer.png" border="0"></span>
	<span><a href="javascript:alloff()"><img src="images/all_off.png" border="0"></a></span>
	<span><img src="images/spacer.png" border="0"></span>
	<span><a href="javascript:refresh()"><img src="images/refresh.png" border="0"></a></span>
</div>

<div id="tabcontainer">
        <ul id="tabs" class="shadetabs">
        <li><a href="#" rel="events" class="selected">Events</a></li>
        <?$rp=getRooms();for($x=0;$x<count($rp);$x++){?>
	<li><a href="?function_get_lights" rel="lights"><?=utf8_encode($rp[$x]["room"]);?></a> </li>
	<ul><?}
if (isset($_GET['function_get_lights'])){$rs=getLightsByRoomID();}
?></ul>
        <br><br>
</div>

<div id="page"><div id="lights"></div></div>
<div id="settings"><a href="admin/"><img src="images/settings.png" border="0" /></a></div>
<div id="copy"><?=getcopy();?></div>
</body>
</html>
