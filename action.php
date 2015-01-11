<?php
	require_once "spoj.php";
	header("content-type: application/json");
	$obj = "";
	$user = $_GET['user'];
	switch ($_GET['action']) {
		case 'user_info':
			if (isset($user)) {
				$obj = array();
				$handle=new SPOJ($user);
				$obj = array(
					'WorldRank' 		=> $handle->getWorldRank(),
					'Points' 		=> $handle->getPoints(),
					'SolvedProblems'	=> $handle->getSolvedProblems(),
					'Country'		=> $handle->getCountry(),
					'Institution'		=> $handle->getInstitution(),
					'TotalSolved'		=> $handle->getTotalSolved(),
					'TotalSubmitted'	=> $handle->getTotalSubmitted(),
					'Accepted'		=> $handle->getAC(),
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
