<?php
	require_once "spoj.php";
	header("content-type: application/json");
	$obj = "";

	switch ($_SERVER['REQUEST_METHOD']) {
		case 'POST':
			$action = mysql_real_escape_string(htmlentities(trim($_POST['action'])));
			$user = mysql_real_escape_string(htmlentities(trim($_POST['user'])));
			break;
		case 'GET':
			$action = mysql_real_escape_string(htmlentities(trim($_GET['action'])));
			$user = mysql_real_escape_string(htmlentities(trim($_GET['user'])));
			break;
	}

	switch ($action) {
		case 'user_info':
			if (isset($user)) {
				$obj = array();
				$handle=new SPOJ($user);
				$obj = array(
					'WorldRank' 		=> $handle->getWorldRank(),
					'Points' 			=> $handle->getPoints(),
					'SolvedProblems'	=> $handle->getSolvedProblems(),
					'Country'			=> $handle->getCountry(),
					'Institution'		=> $handle->getInstitution(),
					'TotalSolved'		=> $handle->getTotalSolved(),
					'TotalSubmitted'	=> $handle->getTotalSubmitted(),
					'Accepted'			=> $handle->getAC(),
					'WrongAnswer'		=> $handle->getWA(),
					'CompilationError'	=> $handle->getCE(),
					'RuntimeError'		=> $handle->getRE(),
					'TimeLimitExceeded'	=> $handle->getTLE()

				);
			} else {
				$obj = "User not set";
			}
			break;
		
		default:
			$obj = "Define a Action";
			break;
	}

	echo json_encode($obj);
?>