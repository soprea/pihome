<?
error_reporting(0);
session_start();

$username=stripslashes($_POST["username"]);
$passwort=stripslashes($_POST["passwort"]);
$page=stripslashes($_GET["p"]);
$query=trim($_GET["q"]);
$user_id = $_SESSION["pihome_usid"];
######## System Includes ########
require('../configs/dbconfig.inc.php');
require('configs/functions.inc.php');
######### LOGIN ############
if($username) { pihome_acp_login($username,$passwort); }
######### LOGOUT ############
if ($page == "logout") { session_unset(); session_destroy(); ob_end_flush(); header("Location: index.php"); }
##### Page Auswahl nach Session #####
if (isset($_SESSION['pihome_username'])){ include("core/admin.php"); }
if (!isset($_SESSION['pihome_username'])){ include("core/login.php"); }
?>
