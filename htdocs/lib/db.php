<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	$db = new mysqli("localhost","20141043","123456","20141043");
	$db->set_charset("utf8");

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>