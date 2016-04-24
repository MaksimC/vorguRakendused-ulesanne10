<?php
session_start();                 // start session
if (!isset($_SESSION["vote"])){  // check, if there is no session variable "vote", then create it. It will define if user has already voted or not
	$_SESSION["vote"] = 0;       // set variable to "0". "!=0" will mean "voted".
}

require_once("vaated/head.html");
// echo $_SESSION["vote"];

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
		include("vaated/destroy_Session.html");
		break;

	case "galerii":
		include("vaated/galerii.html");
	break;

	case "vote":
		if ($_SESSION["vote"]!=0){  // check if use has already voted
			$id = $_SESSION["vote"];
			include ("vaated/alreadyVoted.html"); // if yes, move to already voted page

		} else {
			include("vaated/vote.html"); // if no, let user vote
		}

	break;
	case "tulemus":
		$id=false;

		if (isset($_POST['pilt']) && isset($pildid[$_POST['pilt']])){
			$id=htmlspecialchars($_POST['pilt']);
			$_SESSION["vote"]=$id;              // assign vote variable of a picture, that user selects.
			// echo $_SESSION["vote"];
		}

		include("vaated/tulemus.html");
	break;
	default:
	 include('vaated/pealeht.html');
}


require_once("vaated/foot.html");
?>
