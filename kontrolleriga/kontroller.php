<?php
session_start();                 // start session
if (!isset($_SESSION["vote"])){  // check, if there is no session variable "vote", then create it. It will define if user has already voted or not
	$_SESSION["vote"] = 0;       // set variable to "0". "1" will mean "voted".
}

require_once("vaated/head.html");
echo $_SESSION["vote"];

$pildid = array(
		1=>array('src'=>"pildid/nameless1.jpg", 'alt'=>"nimetu 1"),
		2=>array('src'=>"pildid/nameless2.jpg", 'alt'=>"nimetu 2"),
		3=>array('src'=>"pildid/nameless3.jpg", 'alt'=>"nimetu 3"),
		4=>array('src'=>"pildid/nameless4.jpg", 'alt'=>"nimetu 4"),
		5=>array('src'=>"pildid/nameless5.jpg", 'alt'=>"nimetu 5"),
		6=>array('src'=>"pildid/nameless6.jpg", 'alt'=>"nimetu 6"),
	);
$page="pealeht";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}


switch($page){
	case "destroy":
		include("vaated/destroy_Session.php");
		break;
	case "galerii":
		include("vaated/galerii.html");
	break;
	case "vote":
		if ($_SESSION["vote"]!=0){
			$id = $_SESSION["vote"];
			include ("vaated/alreadyVoted.html");

		} else {
			include("vaated/vote.html");
		}

	break;
	case "tulemus":
		$id=false;

		if (isset($_POST['pilt']) && isset($pildid[$_POST['pilt']])){
			$id=htmlspecialchars($_POST['pilt']);
			$_SESSION["vote"]=$id;
			echo $_SESSION["vote"];
		}

		include("vaated/tulemus.html");
	break;
	default:
	 include('vaated/pealeht.html');
}


require_once("vaated/foot.html");
?>
