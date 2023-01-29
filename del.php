<?php 

	session_start();
	if(!isset($_SESSION['oturum']))
	header("Location: login.php");

	include 'model.php';
	$del_id = $_POST['del_id'];
	$model = new Model();
	$del = $model->del($del_id);
?>