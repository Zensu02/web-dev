<?php
	session_start();

	include "conn.php";

	$admin = $_POST['ladmin'];
	$pass = $_POST['lpass'];

	$msg = [];

	$sql = "SELECT * FROM `tbl_admin`  WHERE `admin` = '$admin' AND `pass` = '$pass';";

	$query = $con->query($sql);


	if ($query->num_rows > 0) {
		$row = $query->fetch_assoc();

		$_SESSION['admin'] = $row['admin'];

		
		$msg['status'] = true;
        $msg['message'] = "Success";
	}else{
		$msg['status'] = false;
		$msg['message'] = "failed";
	}

	echo json_encode($msg);

?>